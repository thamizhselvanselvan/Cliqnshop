<?php

namespace Aimeos\Client\Html\Additional\ThreeBannerSection;

use App\Models\HomePageContent;

class Standard
extends \Aimeos\Client\Html\Common\Client\Factory\Base
implements \Aimeos\Client\Html\Common\Client\Factory\Iface
{
    private $tags = [];
    private $expire;
    private $view;

    public function body( $uid = '' ) : string
    {
        $view = $this->view();
        $config = $this->context()->config();

        $params = ['d_prodid', 'd_name'];
        $confkey = 'client/html/additional/threebannersection';

        if( $html = $this->cached( 'body', $uid, $params, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        $template = $config->get( 'client/html/additional/threebannersection/template-body', 'additional/threebannersection/body' );

        $view = $this->view = $this->view ?? $this->object()->data( $view, $this->tags, $this->expire );
        $html = $this->modify( $view->render( $template ), $uid );

        return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
    }

    public function header( $uid = '' ) : ?string
    {
        $prefixes = [];
        $view = $this->view();
        $config = $this->context()->config();
        $confkey = 'client/html/additional/threebannersection';
        if( $html = $this->cached( 'header', $uid, $prefixes, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        
        $template = $config->get( 'client/html/additional/threebannersection/template-header', 'additional/threebannersection/header' );

        $view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
        $html = $view->render( $template );

        return $this->cache( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
    }

    public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{	
		$context = $this->context();
		$config = $context->config();

        
		$template = $config->get( 'client/html/additional/threebannersection/template-header', 'additional/threebannersection/header' );	

        // $threeBanners = [
		// 	'banner1'=>
		// 	[
		// 		'url' => 'https://demo-article1',
		// 		'image' => 'https://aimeos.org/media/default/logo-1.png',
		// 	],
		// 	'banner2'=>
		// 	[
		// 		'url' => 'https://demo-article2',
		// 		'image' => 'https://aimeos.org/media/default/logo-2.png',

		// 	],
		// 	'banner3'=>
		// 	[
		// 		'url' => 'https://demo-article3',
		// 		'image' => 'https://aimeos.org/media/default/logo-3.png',

		// 	],
            
		// ];


        $target_section = '3_banner_section';
        $site_id=$context->locale()->getsiteid();


        $page_sections = HomePageContent::where([
            ['section', $target_section],
            ['country', $site_id],

        ])->first();
        

		$threeBanners = [];
		if(!empty($page_sections))
		{
			$content = $page_sections->content;			
			$threeBanners = (array)$content ;			
		}        

        $view->threeBanners = $threeBanners;       
        return parent::data( $view, $tags, $expire );

    }


}