<?php

namespace Aimeos\Client\Html\Additional\Supplementtslider;



class Standard
    extends \Aimeos\Client\Html\Catalog\Base
	implements \Aimeos\Client\Html\Iface
{
	
    private $tags = [];
	private $expire;
	private $view;
	
    public function body( string $uid = '' ) : string
	{
        	
		$confkey = 'client/html/additional/supplementtslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'body', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/supplementtslider/template-body', 'additional/supplementtslider/body' );
		$view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
		$html = $view->render( $template );

		return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
	}

    public function header( string $uid = '' ) : ?string
	{
		$confkey = 'client/html/additional/supplementtslider';
		$config = $this->context()->config();

		if( $html = $this->cached( 'header', $uid, [], $confkey ) ) {
			return $this->modify( $html, $uid );
		}

		$template = $config->get( 'client/html/additional/supplementtslider/template-header', 'additional/supplementtslider/header' );
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

		
		$template = $config->get( 'client/html/additional/supplementtslider/template-header', 'additional/supplementtslider/header' );
		$domains = $config->get( 'client/html/catalog/lists/domains', ['media', 'media/property', 'price', 'text'] );
        
        // $domains = $context->config()->get( 'client/html/account/favorite/domains', ['text', 'price', 'media'] );

        
		if( $view->config( 'client/html/cms/page/basket-add', false ) ) {
            $domains = array_merge_recursive( $domains, ['product' => ['default'], 'attribute' => ['variant', 'custom', 'config']] );
		}      
        
        $controller = \Aimeos\Controller\Frontend::create( $context, 'catalog' );

		if (app()->environment(['staging','production']))
		{ 
			$context = app('aimeos.context')->get(false);
            $locale = $context->locale();
            $site=($locale)->getsiteid();
			$sitecode=($locale)->getSiteItem()->getCode();
          if ($sitecode=="in"or"uae") {
		$catid1 = $controller->find('3773931')->getId() ;
		$catid2 = $controller->find('10728501')->getId() ;
		$catid3 = $controller->find('6943346011')->getId() ;
		$catid4 = $controller->find('23777928011')->getId() ;
		$catid5 = $controller->find('23675627011')->getId() ;
		$catid6 = $controller->find('23777927011')->getId() ;
		$catid7 = $controller->find('3774861')->getId() ;
		$catid8 = $controller->find('7301209011')->getId() ;
		$catid9 = $controller->find('9927863011')->getId() ;
		$catid10 = $controller->find('6939949011')->getId() ;
		$catid11 = $controller->find('3773431')->getId() ;
		$catid12 = $controller->find('6939950011')->getId() ;
		$catid13 = $controller->find('6939952011')->getId() ;
		$catid14 = $controller->find('6973704011')->getId() ;
		$catid15 = $controller->find('6973709011')->getId() ;
		$catid16 = $controller->find('6973681011')->getId() ;
		$catid17 = $controller->find('6973717011')->getId() ;
		$catid18 = $controller->find('6973724011')->getId() ;
		$catid19 = $controller->find('3774931')->getId() ;
		$catid20 = $controller->find('6939045011')->getId() ;
		$catid21 = $controller->find('3762131')->getId() ;
		$cat_array = [$catid1,$catid2,$catid3,$catid4,$catid5,$catid6,$catid7,$catid8,$catid9,$catid10,$catid11,$catid12,$catid13,$catid14,$catid15,$catid16,$catid17,$catid18,$catid19,$catid20,$catid21];
		  }
		}
		else {
			$cat_array = '';
		}

		$products = ( clone $cntl )->uses( $domains )
        ->sort('-ctime')
		->category( $cat_array)
        ->slice( 0,500 )
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
