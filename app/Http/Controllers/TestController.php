<?php

namespace App\Http\Controllers;

use Aimeos\Shop\Facades\Shop;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    public function MenuTestPageAction()
    {

        $params = ['page' => 'menutest-index'];
        foreach (app('config')->get('shop.page.menutest-index', ['catalog/tree', 'catalog/home', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('testviews.menutest'), $params)
            ->header('Cache-Control', '');

    }

    public function home2Action()
    {

        $params = ['page' => 'home2-index'];
        foreach (app('config')->get('shop.page.home2-index', ['catalog/tree', 'catalog/home', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('page.home2'), $params)
            ->header('Cache-Control', '');

    }
}