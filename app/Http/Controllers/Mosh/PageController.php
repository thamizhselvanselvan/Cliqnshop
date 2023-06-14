<?php

namespace App\Http\Controllers\Mosh;

use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;
use App\Models\FooterContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    public function how_it_works()
    {
        $context = app('aimeos.context')->get();
        // dd($context);
         $context = app('aimeos.context')->get();
         $locale = $context->locale();
         // dd($locale);
         $site=($locale)->getSiteItem()->getCode();
         // dd($site);
         if($site=="in")
         {
            $params = ['page' => 'how-it-works'];
            foreach (app('config')->get('shop.page.how-it-works') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('page.how-it-works'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
        }
        else {
            $params = ['page' => 'how-it-works'];
            foreach (app('config')->get('shop.page.how-it-works') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('page.how-it-works-uae'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        }
    }

    public function warranty()
    {
        $params = ['page' => 'warranty'];
        foreach (app('config')->get('shop.page.warranty') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        $params['content'] =   $this->getStaticPageContent('warranty');
        

        return Response::view(Shop::template('page.warranty'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }

    public function disclaimer()
    {
        $context = app('aimeos.context')->get();
        // dd($context);
        $context = app('aimeos.context')->get();
        $locale = $context->locale();
        // dd($locale);
        $site=($locale)->getSiteItem()->getCode();
        // dd($site);
       
        $params = ['page' => 'disclaimer'];
        foreach (app('config')->get('shop.page.disclaimer') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        $params['content'] =   $this->getStaticPageContent('disclaimer');

        return Response::view(Shop::template('page.disclaimer'), $params)
        ->header('Cache-Control', 'no-store, max-age=0');
    
    }

    public function legal()
    {
        $params = ['page' => 'legal'];
        foreach (app('config')->get('shop.page.legal') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }
        return Response::view(Shop::template('page.legal'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }


    public function  getStaticPageContent( $page) :string
    {
        $context = app('aimeos.context')->get();
        $locale = $context->locale();
        $sitecode=($locale)->getSiteItem()->getCode();       
        $content = FooterContent::where('site_name', $sitecode)->where('content_name', $page)->pluck('content')->ToArray();        
        !empty($content)?$content=$content[0]:$content='';
        return  $content;        
    }


}


