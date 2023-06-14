<?php

namespace Aimeos\Client\Html\Common\Decorator;

class ListCategories
	extends \Aimeos\Client\Html\Common\Decorator\Base
	implements \Aimeos\Client\Html\Common\Decorator\Iface
{
	public function data( \Aimeos\Base\View\Iface $view, array &$tags = array(), string &$expire = null ) : \Aimeos\Base\View\Iface
	{
		$view = parent::data( $view, $tags, $expire );

		if(!isset($view->listParams['f_supid']) &&  !isset($view->listParams['f_search']) &&  !isset($view->listParams['f_key_search']))			
		{
			$view->listNode = \Aimeos\Controller\Frontend::create( $this->context(), 'catalog' )
			->uses( ['media', 'text'] )->root( $view->param( 'f_catid' ) )
			->getTree( \Aimeos\Controller\Frontend\Catalog\Iface::LIST );
		}

		
        
		return $view;
	}
}