<?php

namespace Aimeos\Client\Html\Additional\CatListContainer;

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
        $confkey = 'client/html/additional/catlistcontainer';

        if( $html = $this->cached( 'body', $uid, $params, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        $template = $config->get( 'client/html/additional/catlistcontainer/template-body', 'additional/catlistcontainer/body' );

        $view = $this->view = $this->view ?? $this->object()->data( $view, $this->tags, $this->expire );
        $html = $this->modify( $view->render( $template ), $uid );

        return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
    }

    public function header( $uid = '' ) : ?string
    {
        $prefixes = [];
        $view = $this->view();
        $config = $this->context()->config();
        $confkey = 'client/html/additional/catlistcontainer';
        if( $html = $this->cached( 'header', $uid, $prefixes, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        
        $template = $config->get( 'client/html/additional/catlistcontainer/template-header', 'additional/catlistcontainer/header' );

        $view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
        $html = $view->render( $template );

        return $this->cache( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
    }

    // public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	// {
    //     $tree = \Aimeos\Controller\Frontend::create( $this->context(), 'catalog' )->uses( $this->domains() )
	// 		->getTree( \Aimeos\Controller\Frontend\Catalog\Iface::LIST );
		

	// 	$products = \Aimeos\Controller\Frontend::create( $this->context(), 'product' )->uses( $this->domains() )
	// 		->category( $tree->getChildren()->getId()->all(), 'promotion' )->search();

	// 	$this->addMetaItemCatalog( $tree, $expire, $tags );
	// 	$this->addMetaItems( $products, $expire, $tags, ['product'] );

	// 	$view->homeTree = $tree;
	// 	// $view->homeStockUrl = $this->stockUrl( $products );

    //     dd($view->homeTree);
	// 	return parent::data( $view, $tags, $expire );
	// }


    public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
        $domains = $view->config( 'client/html/catalog/filter/tree/domains', ['text', 'media', 'media/property'] );
        
		
		$startid = $view->config( 'client/html/catalog/filter/tree/startid' );
		
		$cntl = \Aimeos\Controller\Frontend::create( $this->context(), 'catalog' )
        ->uses( $domains )->root( $startid );
        
		// if( ( $currentid = $view->param( 'f_catid' ) ) === null ) {
        //     $catItems = $cntl->getTree( \Aimeos\MW\Tree\Manager\Base::LEVEL_ONE )->toList();
		// } else {
        //     $catItems = $cntl->getPath( $currentid );
		// }
		
        $catItems = $cntl->getTree( \Aimeos\MW\Tree\Manager\Base::LEVEL_TREE )->toList();

		$tree = $cntl->visible( $catItems->keys()->all() )->getTree( $cntl::TREE );
		
		$this->addMetaItemCatalog( $tree, $expire, $tags );
        
		
		$view->treeCatalogPath = $catItems;
		$view->treeCatalogTree = $tree;
		
		
		return parent::data( $view, $tags, $expire );
	}


    protected function domains() : array
	{
		$context = $this->context();
		$config = $context->config();

		
		$domains = ['catalog', 'media', 'media/property', 'price', 'supplier', 'text', 'product' => ['promotion']];
		$domains = $config->get( 'client/html/catalog/domains', $domains );
		$domains = $config->get( 'client/html/catalog/home/domains', $domains );

		
		if( $config->get( 'client/html/catalog/home/basket-add', false ) ) {
			$domains = array_merge_recursive( $domains, ['attribute' => ['variant', 'custom', 'config']] );
		}

        // $domains= [];

		return $domains;
	}

    

    
}