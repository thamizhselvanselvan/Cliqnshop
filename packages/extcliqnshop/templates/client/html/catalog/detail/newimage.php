<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2014-2022
 */

/* Available data:
 * - mediaItems : Media items incl. referenced items
 */

$enc = $this->encoder();


?>
 <!-- <div class="zooms" onmousemove="zoom(event)" style="background-image: url(https://m.media-amazon.com/images/I/617eDuBBoBL.jpg)">
  <img src="https://m.media-amazon.com/images/I/617eDuBBoBL.jpg" />
</div> -->

<div class="catalog-detail-image" >

	<?php if( ( $imgNum = count( $this->get( 'mediaItems', [] ) ) ) > 0 ) : ?>

		<div class="swiffy-slider slider-item-ratio slider-item-ratio-contain slider-nav-round slider-nav-animation-fadein slider-nav-outside-expand">
			<div class="image-single slider-container" data-pswp="{bgOpacity: 0.75, shareButtons: false}">

				<?php $index = 0; foreach( $this->get( 'mediaItems', [] ) as $id => $mediaItem ) : ?>

					<div class="media-item" onclick="openModal()" data-index="<?= $enc->attr( $index ) ?>">
						<?= $this->MyImage( $mediaItem, $this->config( 'client/html/catalog/detail/imageset-sizes', '(min-width: 2000px) 1920px, (min-width: 500px) 960px, 100vw' ), true ) ?>
					</div>

				<?php $index++; endforeach ?>

			</div>

			<?php if( $imgNum > 1 ) : ?>
				<!-- <button type="button" class="slider-nav" aria-label="Go previous"></button>
				<button type="button" class="slider-nav slider-nav-next" aria-label="Go next"></button> -->
			<?php endif ?>

		</div>

	<?php endif ?>

	<?php if( ( $thumbNum = count( $this->get( 'mediaItems', [] ) ) ) > 1 ) : ?>
        
		<div class="thumbs swiffy-slider slider-nav-dark slider-nav-sm slider-nav-outside slider-item-snapstart slider-nav-visible slider-nav-page">
			<div class="slider-container">

				<?php $index = 0; foreach( $this->get( 'mediaItems', [] ) as $id => $mediaItem ) : ?>

					<div class="thumbnail">
						<img loading="lazy" class="item-thumb img-<?= $index ?>" data-index="<?= $enc->attr( $index ) ?>"
							src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
							alt="<?= $enc->attr( $this->translate( 'client', 'Product image' ) ) ?>"
						>
					</div>

				<?php $index++; endforeach ?>

			</div>

			<?php if( $thumbNum > 6 ) : ?>
				<button type="button" class="slider-nav" aria-label="Go previous"></button>
				<button type="button" class="slider-nav slider-nav-next" aria-label="Go next"></button>
			<?php endif ?>

		</div>

	<?php endif ?>


	<div id="myModal" class="modal">
        <div class="popup-window">
        <span class="close cursor" onclick="closeModal()">&times;</span>
            <div class="images-section">
                <div class="click-zoom" id="Rightside-image">                    
                        <img class="right-show-image normal-zoom"  src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem(),$mediaItem->getFileSystem() ) ) ?>"
							alt="<?= $enc->attr( $this->translate( 'client', 'Product image' ) ) ?> ) ) ?>" alt="no-Image">                    
                </div>
            </div>

            <?php if( ( $thumbNum = count( $this->get( 'mediaItems', [] ) ) ) > 1 ) : ?>
                <div class="thumbs remove-slider">
                    <?php $index = 0; foreach( $this->get( 'mediaItems', [] ) as $id => $mediaItem ) : ?>
                        <div class="thumbnail">
                            <img loading="lazy"  onclick="changeSRC(this)" class="item-thumb img-<?= $index ?>"
                                data-index="<?= $enc->attr( $index ) ?>"
                                src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
                                alt="<?= $enc->attr( $this->translate( 'client', 'Product image' ) ) ?>">
                        </div>
                    <?php $index++; endforeach ?>
                </div>
            <?php endif ?>

            <?php if( ( $thumbNum = count( $this->get( 'mediaItems', [] ) ) ) > 1 ) : ?>
                    <div
                        class="thumbs add-slider swiffy-slider slider-nav-dark slider-nav-sm slider-nav-outside slider-item-snapstart slider-nav-visible slider-nav-page">
                        
                        <div class="slider-container">
                            <?php $index = 0; foreach( $this->get( 'mediaItems', [] ) as $id => $mediaItem ) : ?>
                                <div class="thumbnail">
                                    <img loading="lazy" onclick="changeSRC(this)" class="active item-thumb img-<?= $index ?>" data-index="<?= $enc->attr( $index ) ?>"
                                        src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
                                        alt="<?= $enc->attr( $this->translate( 'client', 'Product image' ) ) ?>">
                                </div>
                            <?php $index++; endforeach ?>
                        </div>
                    </div>
            <?php endif ?>
        </div>
    </div>

</div>

