<?php

namespace Aimeos\Client\Html\Common\Decorator;

class ProductDtailDecorator
	extends \Aimeos\Client\Html\Common\Decorator\Base
	implements \Aimeos\Client\Html\Common\Decorator\Iface
{   

    public function data( \Aimeos\Base\View\Iface $view, array &$tags = array(), string &$expire = null ) : \Aimeos\Base\View\Iface
	{
        $view = parent::data( $view, $tags, $expire );
        
        
        $catId = $view->detailProductItem->getRefItems( 'catalog' )->getId()->last();
        // dd($view->detailProductItem->getLabel());
        // ___________________________________
        $controller = \Aimeos\Controller\Frontend::create( $this->context(), 'catalog' );
        $homeid = $controller->find('home')->getId();
		$stageCatPath = $controller->uses( ['test'] )->getPath( $catId )->remove( $homeid ) ;
        $view->prodStageCatPath =  $stageCatPath;

        $prodName= $view->detailProductItem->getLabel();
        $view->prodName=strlen($prodName) > 25 ? substr($prodName,0,25)."..." : $prodName;
       
        // dd($stageCatPath);
        // ______________________________________

        $path = $controller->getPath( $catId, ['text'] )->getName();
        $path[] = $view->detailProductItem->getName();
        $view->detailBreadcrumb = $path;
        
        return $view;
    }
}