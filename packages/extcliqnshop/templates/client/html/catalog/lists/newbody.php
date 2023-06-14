<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();
$key = $this->param('f_catid') ? 'client/html/catalog/tree/url' : 'client/html/catalog/lists/url';

$target = $this->config('client/html/catalog/tree/url/target');
$controller = $this->config('client/html/catalog/tree/url/controller', 'catalog');
$action = $this->config('client/html/catalog/tree/url/action', 'list');
$config = $this->config('client/html/catalog/tree/url/config', []);

/** client/html/catalog/lists/pagination
 * Enables or disables pagination in list views
 *
 * Pagination is automatically hidden if there are not enough products in the
 * category or search result. But sometimes you don't want to show the pagination
 * at all, e.g. if you implement infinite scrolling by loading more results
 * dynamically using AJAX.
 *
 * @param boolean True for enabling, false for disabling pagination
 * @since 2019.04
 */

/** client/html/catalog/lists/basket-add
 * Display the "add to basket" button for each product item
 *
 * Enables the button for adding products to the basket from the list view.
 * This works for all type of products, even for selection products with product
 * variants and product bundles. By default, also optional attributes are
 * displayed if they have been associated to a product.
 *
 * **Note:** To fetch the necessary product variants, you have to extend the
 * list of domains for "client/html/catalog/lists/domains", e.g.
 *
 *  client/html/catalog/lists/domains = array( 'attribute', 'media', 'price', 'product', 'text' )
 *
 * @param boolean True to display the button, false to hide it
 * @since 2016.01
 * @see client/html/catalog/home/basket-add
 * @see client/html/catalog/detail/basket-add
 * @see client/html/catalog/product/basket-add
 * @see client/html/basket/related/basket-add
 * @see client/html/catalog/domains
 */

/** client/html/catalog/lists/infinite-scroll
 * Enables infinite scrolling in product catalog list
 *
 * If set to true, products from the next page are loaded via XHR request
 * and added to the product list when the user reaches the list bottom.
 *
 * @param boolean True to use infinite scrolling, false to disable it
 * @since 2019.10
 */
$infiniteScroll = $this->config('client/html/catalog/lists/infinite-scroll', false);

$url = '';
if ($infiniteScroll && $this->get('listPageNext', 0) > $this->get('listPageCurr', 0)) {
    $url = $this->link('client/html/catalog/lists/url', ['l_page' => $this->get('listPageNext')] + $this->get('listParams', []));
}

?>

<section class="aimeos catalog-list <?=$enc->attr($this->get('listCatPath', map())->getConfigValue('css-class', '')->join(' '))?>"
	data-jsonurl="<?=$enc->attr($this->link('client/jsonapi/url'))?>">

	<div class="container-xxl">










	<!-- code to fetch the next level nodes -start-  -->

		<?php if (isset($this->listNode)): ?>
		<?php $childrensCount = count($this->listNode->getChildren())?>
		<?php if ($childrensCount >= 1): ?>

			<div class="mb-3">
				<div class="col-sm-12 p-1  section-heading">
					<p class="aside-title aside-title-with-border h2-heading mb-0">
						<span style="padding-left: 35px;">Shop Category</span></p>
						<div class="double-hr"></div>
				</div>
			</div>


			<div class="swiffy-slider cat-sujjest-slider slider-nav-autoplay  slider-nav-outside slider-nav-chevron slider-nav-dark slider-nav-sm  slider-nav-page slider-item-snapstart  slider-nav-autopause" data-slider-nav-autoplay-interval="3000">
				<div class="slider-container ">

				<?php foreach ($this->listNode->getChildren() as $item): ?>
					<?php $params = array_merge($this->get('params', []), ['f_name' => $item->getName('url'), 'f_catid' => $item->getId()])?>


					<div>
						<a class="sujjested-cat-item" href="<?=$enc->attr($this->url(($item->getTarget() ?: $target), $controller, $action, $params, [], $config));?>">
							<h5 class="sujjested-heading"><?=$enc->html($item->getName(), $enc::TRUST);?></h5>
							<div class="sujjested-algin">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
								<!-- code to print the icon start -->
								<?php if ($mediaItem = $item->getRefItems('media', 'icon', 'default')->first()): ?>
									<img  loading="lazy"
										class="sujjested-img"
										src="<?=$enc->attr($this->content($mediaItem->getPreview(), $mediaItem->getFileSystem()))?>"
										alt="<?=$enc->attr($mediaItem->getProperties('title')->first())?>"
									>
								<?php else: ?>
										<img src="/vendor/shop/themes/cliqnshop/assets/default-cat-icon.svg"
											alt="no-img"
											class="sujjested-img"
										>
								<?php endif?>

							</div>
						</a>
					</div>


				<?php endforeach;?>

					<!-- <div class="sujjested-cat-item">
						<h5 class="sujjested-heading">Computers & Accessories</h5>
						<div class="sujjested-algin">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
							<img class="sujjested-img" src="https://cdn-icons-png.flaticon.com/512/3145/3145765.png" alt="">
						</div>
					</div> -->

				</div>

				<?php if ($childrensCount >= 6): ?>
					<button type="button" class="slider-nav" aria-label="Go left"></button>
					<button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
				<?php endif?>

		</div>

		<?php endif?>
		<?php endif?>




	<!-- code to fetch the next level nodes -end-  -->








		<?php if (($catItem = $this->get('listCatPath', map())->last()) !== null): ?>

			<div class="catalog-list-head">

				<?php foreach ($catItem->getRefItems('media', 'default', 'default') as $mediaItem): ?>

					<div class="head-image">
						<img class="<?=$enc->attr($mediaItem->getType())?>"
							src="<?=$enc->attr($this->content($mediaItem->getPreview(true), $mediaItem->getFileSystem()))?>"
							srcset="<?=$enc->attr($this->imageset($mediaItem->getPreviews(true), $mediaItem->getFileSystem()))?>"
							alt="<?=$enc->attr($mediaItem->getProperties('title')->first())?>"
						>
					</div>

				<?php endforeach?>

				<h1 >Results for - <?=$enc->html($catItem->getName())?></h1>

			</div>

		<?php endif?>


		<?php if ($this->get('listProductTotal', 0) > 0): ?>

			<div class="catalog-list-type">
				<a class="type-item type-grid" title="<?=$enc->attr($this->translate('client', 'Grid view'))?>"
					href="<?=$enc->attr($this->link($key, map($this->get('listParams', []))->remove('l_type')->all()))?>"></a>
				<a class="type-item type-list" title="<?=$enc->attr($this->translate('client', 'List view'))?>"
					href="<?=$enc->attr($this->link($key, ['l_type' => 'list'] + $this->get('listParams', [])))?>"></a>
			</div>

		<?php endif?>


		<?php if ($searchText = $this->param('f_search')): ?>

			<div class="list-search">

				<?php if (($total = $this->get('listProductTotal', 0)) > 0): ?>
<script type="text/javascript">
document.onreadystatechange = function(e)
{
    if (document.readyState === 'complete')
    {
		if(!window.location.hash) {
        const showLoading = function() {
        Swal.fire({
            title: 'Please Wait! New Products Are Coming',
            allowEscapeKey: false,
            allowOutsideClick: false,
            background: '#001253',
            showConfirmButton: false,
			timer: 39000,
            onOpen: ()=>{
                Swal.showLoading();
            }

            // timer: 3000,
            // timerProgressBar: true
        });
    };

    showLoading();
    }
	if(!window.location.hash) {
		window.location = window.location + '#loaded';
        setInterval('location.reload()', 40000);
	}
}
};
</script>
					<?=$enc->html(sprintf(
    $this->translate(
        'client',
        'Search result for <span class="searchstring">"%1$s"</span> (%2$d article)',
        'Search result for <span class="searchstring">"%1$s"</span> (%2$d articles)',
        $total
    ),
    $searchText,
    $total
), $enc::TRUST)?>
				<?php else: ?>
					<?=$enc->html(sprintf(
    $this->translate(
        'client',
        'No articles found for <span class="searchstring">"%1$s"</span>. Please try again with a different keyword.'
    ),
    $searchText
), $enc::TRUST)?>
					<br>
					<br>
					<br>
					<br>
					<br>
					<center>
							<!-- <div class="spinner-grow text-primary" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-secondary" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-success" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-danger" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-warning" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-info" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-dark" role="status">
							<span class="sr-only"></span>
							</div> -->
							<svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="50px" height="50px" xmlns="http://www.w3.org/2000/svg">
								<g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
									<g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
										<polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
										<circle cx="43" cy="111" r="13" />
										<circle cx="102" cy="111" r="13" />
									</g>
									<g class="cart__lines" stroke="currentColor">
										<polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
										<g class="cart__wheel1" transform="rotate(-90,43,111)">
											<circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
										</g>
										<g class="cart__wheel2" transform="rotate(90,102,111)">
											<circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
										</g>
									</g>
								</g>
							</svg>
						</center>
				<?php endif?>

			</div>

		<?php endif?>


		<?php if ($searchKeyText = $this->param('f_key_search')): ?>

			<div class="list-search">

				<?php if (($total = $this->get('listProductTotal', 0)) > 0): ?>
					<?=$enc->html(sprintf(
    $this->translate(
        'client',
        'Search result for <span class="searchstring">"%1$s"</span> (%2$d article)',
        'Search result for <span class="searchstring">"%1$s"</span> (%2$d articles)',
        $total
    ),
    $searchKeyText,
    $total
), $enc::TRUST)?>
				<?php else: ?>
					<?=$enc->html(sprintf(
    $this->translate(
        'client',
        'No articles found for <span class="searchstring">"%1$s"</span>. Please try again with a different keyword.'
    ),
    $searchKeyText
), $enc::TRUST)?>
					<br>
					<br>
					<br>
					<br>
					<br>
					<center>
							<!-- <div class="spinner-grow text-primary" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-secondary" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-success" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-danger" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-warning" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-info" role="status">
							<span class="sr-only"></span>
							</div>
							<div class="spinner-grow text-dark" role="status">
							<span class="sr-only"></span>
							</div> -->
							<svg class="cart" role="img" aria-label="Shopping cart line animation" viewBox="0 0 128 128" width="50px" height="50px" xmlns="http://www.w3.org/2000/svg">
								<g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
									<g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
										<polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
										<circle cx="43" cy="111" r="13" />
										<circle cx="102" cy="111" r="13" />
									</g>
									<g class="cart__lines" stroke="currentColor">
										<polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" stroke-dasharray="338 338" stroke-dashoffset="-338" />
										<g class="cart__wheel1" transform="rotate(-90,43,111)">
											<circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
										</g>
										<g class="cart__wheel2" transform="rotate(90,102,111)">
											<circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68" stroke-dashoffset="81.68" />
										</g>
									</g>
								</g>
							</svg>
						</center>
				<?php endif?>

			</div>

			<?php endif?>


		<?php $response = $this->get('response');?>
		<?php if ($response !== null): ?>
		<?php $success = $response->json();?>
	<?php if ($success == "successfully"): ?>
		<?php $total = $this->get('listProductTotal');?>
		<?php if ($total == 0): ?>
			<script>
	if(!window.location.hash) {
		window.location = window.location + '#loaded';
setInterval('location.reload()', 40000);
	}
	else {
		<?php if ($total == 0): ?>
			swal("Ohh No!", "No Product Found!", "warning");
			setInterval('history.back()', 8000);
	<?php endif?>
	}
</script>
<?php endif?>
<?php endif?>
<?php endif?>
		<?php if ($this->get('listProductTotal', 0) > 0 && $this->config('client/html/catalog/lists/pagination', true)): ?>
			<?=$this->partial('catalog/lists/pagination', [
    'params' => $this->get('listParams', []),
    'size' => $this->get('listPageSize', 48),
    'total' => $this->get('listProductTotal', 0),
    'current' => $this->get('listPageCurr', 0),
    'prev' => $this->get('listPagePrev', 0),
    'next' => $this->get('listPageNext', 0),
    'last' => $this->get('listPageLast', 0),
])
?>
		<?php endif?>


		<?=$this->partial(
    $this->get('listPartial', 'catalog/lists/items'),
    array(
        'require-stock' => (int) $this->config('client/html/basket/require-stock', true),
        'basket-add' => $this->config('client/html/catalog/lists/basket-add', false),
        'products' => $this->get('listProductItems', map()),
        'position' => $this->get('listPosition'),
        'infinite-url' => $url,
    )
)?>


		<?php if ($this->get('listProductTotal', 0) > 0 && $this->config('client/html/catalog/lists/pagination', true)): ?>
			<?=$this->partial('catalog/lists/pagination', [
    'params' => $this->get('listParams', []),
    'size' => $this->get('listPageSize', 48),
    'total' => $this->get('listProductTotal', 0),
    'current' => $this->get('listPageCurr', 0),
    'prev' => $this->get('listPagePrev', 0),
    'next' => $this->get('listPageNext', 0),
    'last' => $this->get('listPageLast', 0),
])
?>
		<?php endif?>


		<?php if ($this->get('listPageCurr', 0) <= 1 && ($catItem = $this->get('listCatPath', map())->last()) !== null): ?>
			<div class="catalog-list-footer">
				<?php foreach ($catItem->getRefItems('text', 'long', 'default') as $textItem): ?>
					<div class="footer-text">
						<?=$enc->html($textItem->getContent(), $enc::TRUST)?>
					</div>
				<?php endforeach?>
			</div>
		<?php endif?>

	</div>
</section>
