<?php

namespace Aimeos\Client\Html\Additional\BrandsShowcaseSection;

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
        $confkey = 'client/html/additional/brandsshowcasesection';

        if( $html = $this->cached( 'body', $uid, $params, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        $template = $config->get( 'client/html/additional/brandsshowcasesection/template-body', 'additional/brandsshowcasesection/body' );

        $view = $this->view = $this->view ?? $this->object()->data( $view, $this->tags, $this->expire );
        $html = $this->modify( $view->render( $template ), $uid );

        return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
    }

    public function header( $uid = '' ) : ?string
    {
        $prefixes = [];
        $view = $this->view();
        $config = $this->context()->config();
        $confkey = 'client/html/additional/brandsshowcasesection';
        if( $html = $this->cached( 'header', $uid, $prefixes, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        
        $template = $config->get( 'client/html/additional/brandsshowcasesection/template-header', 'additional/brandsshowcasesection/header' );

        $view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
        $html = $view->render( $template );

        return $this->cache( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
    }

    public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		
		$texts = [];
		$context = $this->context();
		$config = $context->config();
		$cntl = \Aimeos\Controller\Frontend::create( $context, 'product' );

		
		$template = $config->get( 'client/html/additional/brandsshowcasesection/template-header', 'additional/brandsshowcasesection/header' );
		

        // $logos = [
		// 	'logo1'=>
		// 	[
		// 		'url' => 'https://demo-article1',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-1.png',
		// 		'image_alt' => 'alt text goes here'
		// 	],
		// 	'logo2'=>
		// 	[
		// 		'url' => 'https://demo-article2',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-2.png',
		// 		'image_alt' => 'alt text goes here'

		// 	],
		// 	'logo3'=>
		// 	[
		// 		'url' => 'https://demo-article3',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-3.png',
		// 		'image_alt' => 'alt text goes here'

		// 	],
        //     'logo4'=>
		// 	[
		// 		'url' => 'https://demo-article6',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-1.png',
		// 		'image_alt' => 'alt text goes here'

		// 	],

        //     'logo5'=>
		// 	[
		// 		'url' => 'https://demo-article5',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-2.png',
		// 		'image_alt' => 'alt text goes here'

		// 	],
        //     'logo6'=>
		// 	[
		// 		'url' => 'https://demo-article6',
		// 		'image_path' => 'https://aimeos.org/media/default/logo-3.png',
		// 		'image_alt' => 'alt text goes here'

		// 	],
		// ];

        
		$target_section = 'trending_brands_section';
        $site_id=$context->locale()->getsiteid();


        $page_sections = HomePageContent::where([
            ['section', $target_section],
            ['country', $site_id],

        ])->first();
        
		
		

		$trending_brands = [];
		if(!empty($page_sections))
		{
			$content = $page_sections->content;			
			$trending_brands = (array)$content ;			
		} 
        $view->trending_brands = $trending_brands;       
        return parent::data( $view, $tags, $expire );


		

    }


}