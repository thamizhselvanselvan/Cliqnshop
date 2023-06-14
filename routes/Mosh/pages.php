<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mosh\PageController;


Route::get('how-it-works', [
    'as' => 'aimeos_shop_how-it-works',
    'uses'=>'App\Http\Controllers\Mosh\PageController@how_it_works'
]);

Route::get('warranty', [
    'as' => 'aimeos_shop_warranty',
    'uses'=>'App\Http\Controllers\Mosh\PageController@warranty'
]);

Route::get('disclaimer', [
    'as' => 'aimeos_shop_disclaimer',
    'uses'=>'App\Http\Controllers\Mosh\PageController@disclaimer'
]);

Route::get('legal', [
    'as' => 'aimeos_shop_legal',
    'uses'=>'App\Http\Controllers\Mosh\PageController@legal'
]);

Route::get('contact_page', [
    'as' => 'aimeos_shop_contactus',
    'uses'=>'App\Http\Controllers\MyController@contactAction'
]);

Route::get('faq_page', [
    'as' => 'aimeos_shop_faq',
    'uses'=>'App\Http\Controllers\MyController@faqAction'
]);

Route::get('terms_page', [
    'as' => 'aimeos_shop_terms',
    'uses'=>'App\Http\Controllers\MyController@termsAction'
]);

Route::get('privacy_page', [
    'as' => 'aimeos_shop_privacy',
    'uses'=>'App\Http\Controllers\MyController@privacyAction'
]);

Route::get('return-policy', [
    'as' => 'aimeos_shop_return_refund',
    'uses'=>'App\Http\Controllers\MyController@returnRefundAction'
]);
   
if (app()->environment(['local','staging'])) 
{
        Route::get('home2', [
            'as' => 'aimeos_shop_home2',
            'uses'=>'App\Http\Controllers\TestController@home2Action'
            
        ]);  

        Route::get('menutest', [
            'as' => 'aimeos_shop_menutest',
            'uses'=>'App\Http\Controllers\TestController@MenuTestPageAction'
            
        ]);  

}