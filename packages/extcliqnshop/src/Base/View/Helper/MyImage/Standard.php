<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2020-2022
 * @package MW
 * @subpackage View
 */


namespace Aimeos\Base\View\Helper\MyImage;


/**
 * View helper class for creating an HTML image tag
 *
 * @package MW
 * @subpackage View
 */
class Standard
	extends \Aimeos\Base\View\Helper\Base
	implements \Aimeos\Base\View\Helper\Image\Iface
{
	/**
	 * Returns the HTML image tag for the given media item
	 *
	 * @param \Aimeos\MShop\Media\Item\Iface $media Media item
	 * @param string $sizes Preferred image srcset sizes
	 * @param bool $main TRUE for main image, FALSE for secondary images
	 * @return string HTML image tag
	 */
	public function transform( \Aimeos\MShop\Media\Item\Iface $media, string $sizes = '', $main = true ) : string
	{
		$view = $this->view();
		$enc = $view->encoder();

		$sources = [];
		foreach( $media->getPreviews() as $type => $path ) {
			$sources[$type] = $view->content( $path, 'fs-media' );
		}

		$variant = '';
		foreach( $media->getRefItems( 'attribute', null, 'variant' ) as $id => $item ) {
			$variant .= ' data-variant-' . $item->getType() . '="' . $enc->attr( $id ) . '"';
		}

		if( !strncmp( $media->getMimetype(), 'video/', 6 ) )
		{
			return '
				<video autoplay muted class="item" id="image-' . $media->getId() . '" loading="lazy"
					thumbnail="' . $enc->attr( $view->content( $media->getPreview(), $media->getFileSystem() ) ) . '"
					poster="' . $enc->attr( $view->content( $media->getPreview( 600 ), $media->getFileSystem() ) ) . '"
					src="' . $enc->attr( $view->content( $media->getUrl(), $media->getFileSystem() ) ) . '"
					alt="' . $enc->attr( $media->getProperties( 'title' )->first( $media->getName() ) ) . '"
					' . $variant . ' />
				</video>
			';
		}

		return '
		<div class="zooms" onmousemove="zoom(event)" style="position: relative; width: auto;  background-image: url(' . $enc->attr( $view->content( $media->getPreview(), $media->getFileSystem() ) ) . ')" itemscope itemprop="image" itemtype="http://schema.org/ImageObject" representativeOfPage="' . ( $main ? 'true' : 'false' ) . '">
			<img class="item" id="image-' . $media->getId() . '" loading="lazy" itemprop="contentUrl"
				thumbnail="' . $enc->attr( $view->content( $media->getPreview(), $media->getFileSystem() ) ) . '"
				src="' . $enc->attr( $view->content( $media->getPreview(), $media->getFileSystem() ) ) . '"
				srcset="' . $enc->attr( $view->imageset( $media->getPreviews( true ), $media->getFileSystem() ) ) . '"
				data-zoom="' . $enc->attr( $view->content( $media->getUrl(), $media->getFileSystem() ) ) . '"
				alt="' . $enc->attr( $media->getProperties( 'title' )->first( $media->getName() ) ) . '"
				sizes="' . $sizes . '" ' . $variant . ' />
		</div>
	';
	}
}
