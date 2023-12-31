<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $params = ['page' => 'register-index'];
        foreach( app( 'config' )->get( 'shop.page.register-index', [ 'catalog/tree', 'basket/mini'] ) as $name )
		{
			$params['aiheader'][$name] = Shop::get( $name )->header();
			$params['aibody'][$name] = Shop::get( $name )->body();
		}
        return Response::view( Shop::template( 'auth.register' ), $params )
        ->header( 'Cache-Control', '' ); 
        // return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->check($request);

        $user = $this->user($request);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::home());
    }


    /**
     * Returns the site ID the user should be associated to
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string Site ID
     */
    protected function siteid(Request $request) : string
    {
        $context = app( 'aimeos.context' )->get();
        $manager = \Aimeos\MShop::create( $context, 'locale/site' );

        $root = $manager->find( config( 'shop.mshop.locale.site', 'default' ) );
        $siteId = $root->getSiteId();

        if( config( 'app.shop_registration' ) )
        {
            $code = $request->code;
            $item = $manager->create()->setCode( $code )->setLabel( $code )->setStatus( 1 );
            $siteId = $manager->insert( $item, $root->getId() )->getSiteId();

            \Aimeos\Setup::use( new \Aimeos\Bootstrap() )->context( $context )->verbose( '' )->up( $code );
        }

        return $siteId;
    }


    /**
     * Returns the newly created user
     *
     * @param  \Illuminate\Http\Request $request
     * @return \App\Models\User $user
     */
    protected function user(Request $request) : \App\Models\User
    {
        $user = User::create([
            'name' => $request->code ?? $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'siteid' => '',
        ]);

        if( config( 'app.shop_registration' ) )
        {
            $context = app( 'aimeos.context' )->get();
            $group = config( 'app.shop_permission', 'admin' );

            $context->setLocale( \Aimeos\MShop::create( $context, 'locale' )->bootstrap( $request->code ) );
            $groupId = \Aimeos\MShop::create( $context, 'customer/group' )->find( $group )->getId();

            $manager = \Aimeos\MShop::create( $context, 'customer/lists' );
            $item = $manager->create()
                ->setDomain( 'customer/group' )
                ->setParentId( $user->id )
                ->setType( 'default' )
                ->setRefId( $groupId );

            $manager->save( $item );
        }

        return $user;
    }


    /**
     * Validates the values entered for the user
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function check(Request $request)
    {
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        if( config( 'app.shop_registration' ) ) {
            $rules['code'] = ['required', 'string', 'max:255', 'unique:mshop_locale_site', 'regex:/^[a-z0-9\-]+(\.[a-z0-9\-]+)?$/i'];
        } else {
            $rules['name'] = ['required', 'string', 'max:255'];
        }

        $request->validate($rules);
    }
}
