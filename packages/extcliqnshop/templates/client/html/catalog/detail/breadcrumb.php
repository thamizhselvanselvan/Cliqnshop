<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();

?>

<!-- direct catalog staging breadcrumb , --after eliminating catalog/stage component,  code--start -->
<?php if (isset($this->detailBreadcrumb)): ?>
	<section class="aimeos catalog-stage <?= $enc->attr( $this->get( 'stageCatPath', map() )->getConfigValue( 'css-class', '' )->join( ' ' ) ) ?>"
	data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
		<div class="catalog-stage-breadcrumb container-xxl">
			<nav class="breadcrumb">
				<span class="title"><?= $enc->html( $this->translate( 'client', 'You are here:' ), $enc::TRUST ) ?></span>
				<ol>
					<?php  if(isset( $this->prodStageCatPath )): ?>
						<?php foreach( $this->get( 'prodStageCatPath', map() ) as $cat ) : ?>
							<li>
								<a href="<?= $enc->attr( $this->link( 'client/html/catalog/tree/url', array_merge( $this->get( 'stageParams', [] ), ['f_name' => $cat->getName( 'url' ), 'f_catid' => $cat->getId()] ) ) ) ?>">
									<?= $enc->html( $cat->getName() ) ?>
								</a>
							</li>
						<?php endforeach ?>
							<li>
							<a><?= $this->prodName  ?></a>
							</li>
					<?php  endif  ?>
				</ol>
			</nav>
		</div>
	</section>
	
<?php endif?>
<!-- direct catalog staging breadcrumb , --after eliminating catalog/stage component,  code--end -->