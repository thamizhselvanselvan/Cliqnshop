<?php

namespace Aimeos\Client\Html\NewMenu\Design1;


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
        $confkey = 'client/html/newmenu/design1';

        if( $html = $this->cached( 'body', $uid, $params, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        $template = $config->get( 'client/html/newmenu/design1/template-body', 'newmenu/design1/body' );

        $view = $this->view = $this->view ?? $this->object()->data( $view, $this->tags, $this->expire );
        $html = $this->modify( $view->render( $template ), $uid );

        return $this->cache( 'body', $uid, [], $confkey, $html, $this->tags, $this->expire );
    }

    public function header( $uid = '' ) : ?string
    {
        $prefixes = [];
        $view = $this->view();
        $config = $this->context()->config();
        $confkey = 'client/html/newmenu/design1';
        if( $html = $this->cached( 'header', $uid, $prefixes, $confkey ) ) {
            return $this->modify( $html, $uid );
        }

        
        $template = $config->get( 'client/html/newmenu/design1/template-header', 'newmenu/design1/header' );

        $view = $this->view = $this->view ?? $this->object()->data( $this->view(), $this->tags, $this->expire );
        $html = $view->render( $template );

        return $this->cache( 'header', $uid, $prefixes, $confkey, $html, $this->tags, $this->expire );
    }



    public function data( \Aimeos\Base\View\Iface $view, array &$tags = [], string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		
		$domains = $view->config( 'client/html/catalog/filter/tree/domains', ['text', 'media', 'media/property'] );

		
		$startid = $view->config( 'client/html/catalog/filter/tree/startid' );
       

		$cntl = \Aimeos\Controller\Frontend::create( $this->context(), 'catalog' )
			->uses( $domains )->root( $startid );

		

        $catItems = $cntl->getTree( \Aimeos\MW\Tree\Manager\Base::LEVEL_TREE )->toList();

		$tree = $cntl->visible( $catItems->keys()->all() )->getTree( $cntl::TREE );

		$this->addMetaItemCatalog( $tree, $expire, $tags );

		$view->treeCatalogPath = $catItems;
		$view->treeCatalogTree = $tree;

        
		return parent::data( $view, $tags, $expire );
	}

    


}