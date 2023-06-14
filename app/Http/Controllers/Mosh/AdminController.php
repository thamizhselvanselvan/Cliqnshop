<?php

/**
 * @license MIT, http://opensource.org/licenses/MIT
 * @copyright Aimeos (aimeos.org), 2014-2016
 * @package laravel
 * @subpackage Controller
 */


 namespace App\Http\Controllers\Mosh;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


/**
 * Controller providing the ExtJS administration interface
 *
 * @package laravel
 * @subpackage Controller
 */
class AdminController extends Controller
{
	use AuthorizesRequests;


	/**
	 * Returns the initial HTML view for the admin interface.
	 *
	 * @param \Illuminate\Http\Request $request Laravel request object
	 * @return \Illuminate\Contracts\View\View View for rendering the output
	 */
	public function indexAction( \Illuminate\Http\Request $request )
	{
		if( Auth::check() === false
			|| $request->user()->can( 'admin', [AdminController::class, ['admin', 'editor','order','catalog']] ) === false
		) {
			return redirect()->guest( airoute( 'login', ['locale' => app()->getLocale()] ) );
		}

		$context = app( 'aimeos.context' )->get( false );
		$siteManager = \Aimeos\MShop::create( $context, 'locale/site' );
		$siteId = current( array_reverse( explode( '.', trim( $request->user()->siteid, '.' ) ) ) );
		$siteCode = ( $siteId ? $siteManager->get( $siteId )->getCode() : config( 'shop.mshop.locale.site', 'default' ) );
		$locale = $request->user()->langid ?: config( 'app.locale', 'en' );

        $user_id = Auth::id();

		$group_id = DB::table('users_list')->where('siteid',$siteId.'.')->where('parentid',$user_id)->pluck('refid')->ToArray();

        $group_code = DB::table('mshop_customer_group')->where('siteid',$siteId.'.')->where('id',$group_id)->pluck('code')->ToArray();
        
		$param = array(
            'resource' => 'dashboard',
            'site' => Route::input( 'site', Request::get( 'site', $siteCode ) ),
            'locale' => Route::input( 'locale', Request::get( 'locale', $locale ) )
        );

    if(isset($group_code[0])) {
        if(($group_code[0]) == "order") {
            $param['resource'] = 'order';
        }
    }

    if(isset($group_code[0])) {
        if($group_code[0] == "catalog") {
            $param['resource'] = 'product';
        }
    }   

		return redirect()->route( 'aimeos_shop_jqadm_search', $param );
        
	}
}
