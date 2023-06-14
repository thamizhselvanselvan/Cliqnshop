<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Aimeos\Shop\Facades\Shop;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {

        $params = ['page' => 'verify-email'];
        $params = ['request' => $request];
        foreach( app( 'config' )->get( 'shop.page.verify-email', [ 'catalog/tree', 'basket/mini'] ) as $name )
		{
			$params['aiheader'][$name] = Shop::get( $name )->header();
			$params['aibody'][$name] = Shop::get( $name )->body();
		}        

        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::home())
                    :Response::view( Shop::template( 'auth.verify-email' ), $params )
                    ->header( 'Cache-Control', '' );

              

        // return $request->user()->hasVerifiedEmail()
        //             ? redirect()->intended(RouteServiceProvider::home())
        //             : view('auth.verify-email');
    }
}
