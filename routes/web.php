<?php

use Illuminate\Http\Request;
use App\Services\Helper_class;
use App\Http\Controllers\tmp_order;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SlackNotification;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Notification;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Test
//  Test ""

$params = [];
$conf = ['prefix' => '', 'where' => []];

Route::get('order_confirmation/test', [Helper_class::class, 'order_confirmation']);
Route::get('ship_notification/test', [Helper_class::class, 'ship_notification']);


Route::any("test", function () {

    dd(public_path() . " <- public path - base_path ->  " . base_path());
});

if (env('SHOP_MULTILOCALE')) {
    $conf['prefix'] .= '{locale}';
    $conf['where']['locale'] = '[a-z]{2}(\_[A-Z]{2})?';
    $params = ['locale' => app()->getLocale()];

    Route::get('/admin', function () use ($params) {
        return redirect(airoute('aimeos_shop_admin', $params));
    });
}

if (config('app.shop_multishop')) {
    $conf['prefix'] .= '/{site}';
    $conf['where']['site'] = '[A-Za-z0-9\.\-]+';
}


if ($conf['prefix']) {
    Route::get('/', function (Request $request) use ($params) {
        if(($currentUserInfo = Location::get($request->ip())) !== false
		&& $currentUserInfo->countryName !== 'India') {
		$params['site'] = 'uae';
	} 
        return redirect(airoute('aimeos_home', $params));
    });
}

Route::group($conf ?? [], function () {
    require __DIR__ . '/auth.php';
});

Route::group([], function() {
    require __DIR__.'/Mosh/multisite-auth.php';
});

Route::get('tmp_order', 'App\Http\Controllers\tmp_order@index',);
Route::get('tmp_order/xml/{id}', 'App\Http\Controllers\tmp_order@xml')->name('tmp_order/xml');

       

        
        



        Route::any('kyc_store', [
            'as' => 'aimeos_shop_store_kyc',
            'uses'=>'App\Http\Controllers\MyController@kyc_store'
        ])->middleware('web','auth');

        // Route::get('/test_do_bucket', function()
        // {
        //     $file_path_front = 'staging/test.jpg';
        //     $file_path = Storage::path('KYC_2022/November/Adhaar_Card2101122043543_back.jpg');
        //     Log::alert($file_path);
        //     $file= file_get_contents($file_path);
        //     // Log::alert($file);
        //     Storage::disk('do')->put($file_path_front, $file);
        // });

       
        //slack Test
Route::get('slack/test', function() {
    Notification::route('slack', config('app.slack_notification_webhook'))
    ->notify(new SlackNotification());
dd(test);

});

Route::any('contact_store', [
    'as' => 'aimeos_shop_store_contact',
    'uses'=>'App\Http\Controllers\MyController@contact_store'
])->middleware('web');

Route::group(['prefix' => '{site}', 'middleware' => ['web']], function () {
    Route::get('/', '\Aimeos\Shop\Controller\CatalogController@homeAction')
        ->name('aimeos_home')->where( ['site' => '[a-z0-9\-]+'] );
        require __DIR__ . '/Mosh/pages.php';
});

if( ( $conf = config( 'shop.routes.account', ['prefix' => 'profile', 'middleware' => ['web', 'auth']] ) ) !== false ) {

	Route::group( $conf, function() {

        Route::any('kyc', [
            'as' => 'aimeos_shop_kyc_cliqnshop',
            'uses'=>'App\Http\Controllers\MyController@kyc_index'
        ])->middleware('web','auth');

        Route::get('orders', [
            'as' => 'aimeos_shop_orders',
            'uses'=>'App\Http\Controllers\MyController@review_index'
        ])->middleware('web','auth');

        Route::get('address', [
            'as' => 'aimeos_shop_address',
            'uses'=>'App\Http\Controllers\MyController@address_index'
        ])->middleware('web','auth');


        Route::get('subscription', [
            'as' => 'aimeos_shop_subscription',
            'uses'=>'App\Http\Controllers\MyController@subscription_index'
        ])->middleware('web','auth');

        Route::match( array( 'GET', 'POST' ), 'favorite/{fav_action?}/{fav_id?}/{d_name?}/{d_pos?}', [
            'as' => 'aimeos_shop_account_favorite',
            'uses'=>'App\Http\Controllers\MyController@favorite_index'
        ])->middleware('web','auth');

        Route::match( array( 'GET', 'POST' ), 'watch/{wat_action?}/{wat_id?}/{d_name?}/{d_pos?}', [
            'as' => 'aimeos_shop_account_watch',
            'uses'=>'App\Http\Controllers\MyController@watch_index'
        ])->middleware('web','auth');
    });
}

if( ( $conf = config( 'shop.routes.admin', ['prefix' => 'admin', 'middleware' => ['web']] ) ) !== false ) {

	Route::group( $conf, function() {

		Route::match( array( 'GET' ), '', array(
			'as' => 'aimeos_shop_admin',
			'uses' => 'App\Http\Controllers\Mosh\AdminController@indexAction'
		) )->where( ['locale' => '[a-z]{2}(\_[A-Z]{2})?', 'site' => '[A-Za-z0-9\.\-]+'] );

	});
}
