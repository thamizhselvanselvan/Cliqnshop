<?php

namespace Aimeos\Client\Html\Additional\ProductSlider;

use App\Models\HomePageContent;

class Standard
    extends \Aimeos\Client\Html\Catalog\Base
	implements \Aimeos\Client\Html\Iface
{
	
    private $tags = [];
	private $expire;
	private $view;
	
    public function body( string $uid = '' ) : string
	{
        	
		$confkey = 'client/html/additional/productslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'body', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/productslider/template-body', 'additional/productslider/body' );
		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
	}

    public function header( string $uid = '' ) : ?string
	{
		$confkey = 'client/html/additional/productslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'header', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/productslider/template-header', 'additional/productslider/header' );
		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'header', $uid, [], $confkey, $html, $this->tags, $this->expire );
	}

    
    public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		
		$texts = [];
		$context = $this->context();
		$config = $context->config();
		$cntl = \Aimeos\Controller\Frontend::create( $context, 'product' );

		
		$template = $config->get( 'client/html/additional/productslider/template-header', 'additional/productslider/header' );
		$domains = $config->get( 'client/html/catalog/lists/domains', ['media', 'media/property', 'price', 'text'] );
        
        // $domains = $context->config()->get( 'client/html/account/favorite/domains', ['text', 'price', 'media'] );

        
		if( $view->config( 'client/html/cms/page/basket-add', false ) ) {
            $domains = array_merge_recursive( $domains, ['product' => ['default'], 'attribute' => ['variant', 'custom', 'config']] );
		}      
        

		// code to update  the 3 banners section in table
		// $three_banners = [
		// 	'banner1'=>
		// 	[
		// 		'url' => 'https://demo-article1',
		// 		'image' => 'image_path1'
		// 	],
		// 	'banner2'=>
		// 	[
		// 		'url' => 'https://demo-article2',
		// 		'image' => 'image_path2'
		// 	],
		// 	'banner3'=>
		// 	[
		// 		'url' => 'https://demo-article3',
		// 		'image' => 'image_path3'
		// 	],
		// ];        
		// HomePageContent::where('section', '3_banner_section')->update(['content' => $three_banners]);
		// code to update  the 3 banners section in table
		

		// code to update the latest products
		// $product_codes = ['demo-article','EN123','demo-article-7','demo-article-7'];

		$target_section = 'top_selling_products_section';
        $site_id=$context->locale()->getsiteid();
		

		$page_sections = HomePageContent::where([
            ['section', $target_section],
            ['country', $site_id],

        ])->first();
		
		

		$product_codes = [] ;
		if(!empty($page_sections))
		{
			$content = $page_sections->content;
			$created_at = $page_sections->created_at;
			$updated_at = $page_sections->updated_at;

			$product_codes = $content ;
			// dd($content);
		}
       
		
    
		// dd($product_codes);
		
		
		

		$products = ( clone $cntl )->uses( $domains )
		// ->category( 1, 'default' )
        ->compare( "==" , "product.asin" ,$product_codes  )
		// ->filter->make( ['product.code' => ['demo-selection-article-3','demo-selection-article-4']  ] )
        ->slice( 0,100 )
        ->search();

        
        $this->addMetaItems( $products, $expire, $tags );
        
        $tview = $context->view()->set( 'products', $products );
        
        if( !$products->isEmpty() && (bool) $config->get( 'client/html/catalog/lists/stock/enable', true ) === true ) 
        {
            $tview->itemsStockUrl = $this->getStockUrl( $tview, $products );
        }

        $view->sliderItems = $products; 
		return parent::data( $view, $tags, $expire );
	}

	
}
