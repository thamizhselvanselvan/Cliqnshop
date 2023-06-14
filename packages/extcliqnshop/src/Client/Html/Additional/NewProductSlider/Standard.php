<?php

namespace Aimeos\Client\Html\Additional\NewProductSlider;

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
        	
		$confkey = 'client/html/additional/newproductslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'body', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/newproductslider/template-body', 'additional/newproductslider/body' );
		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
	}

    public function header( string $uid = '' ) : ?string
	{
		$confkey = 'client/html/additional/newproductslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'header', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/newproductslider/template-header', 'additional/newproductslider/header' );
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

		
		$template = $config->get( 'client/html/additional/newproductslider/template-header', 'additional/newproductslider/header' );
		$domains = $config->get( 'client/html/catalog/lists/domains', ['media', 'media/property', 'price', 'text'] );
        
        // $domains = $context->config()->get( 'client/html/account/favorite/domains', ['text', 'price', 'media'] );

        
		if( $view->config( 'client/html/cms/page/basket-add', false ) ) {
            $domains = array_merge_recursive( $domains, ['product' => ['default'], 'attribute' => ['variant', 'custom', 'config']] );
		}      
        

		
		
		

		$products = ( clone $cntl )->uses( $domains )
		// ->category( 1, 'default' )       
		// ->filter->make( ['product.code' => ['demo-selection-article-3','demo-selection-article-4']  ] )
        ->sort('-ctime')
        ->slice( 0,200 )
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
