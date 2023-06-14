<?php
$enc = $this->encoder();

?>




<section class="aimeos cms-page container-fluid" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ); ?>">

    <?php if (count($this->get( 'sliderItems'))<=0): ?>
                <center><p style="color:orange;">---There is no products to show currently---</p></center>
    <?php  else : ?>

        <div class="">        
            <div class="catalog-list swiffy-slider  slider-nav-square slider-nav-dark">
                <div class="catalog-list-items product-list slider-container">

                    <?= $this->partial(
                        $this->config( 'client/html/common/partials/products', 'common/partials/products' ),
                        array(
                            'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
                            'basket-add' => $this->config( 'client/html/cms/page/basket-add', false ),
                            'products' => $this->get( 'sliderItems', map() ),
                        )
                    ) ?>
                    
                </div>

                <button type="button" class="slider-nav" aria-label="Go to previous" ></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>

                <?php if( isset( $this->itemsStockUrl ) ) : ?>
                    <?php foreach( $this->itemsStockUrl as $url ) : ?>
                        <script class="items-stock" defer src="<?= $enc->attr( $url ) ?>"></script>
                    <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>

    <?php endif ?>

    


</section>
