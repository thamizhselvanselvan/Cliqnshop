<?php

$enc = $this->encoder();
$config = $this->config( 'client/html/locale/select/language/url/config', [] );


?>
<?php
        $context = app('aimeos.context')->get(false);
        $locale = $context->locale();
        $sitecode=($locale)->getSiteItem()->getCode();
?>

<div class="block-heading-section pt-4 pb-2">
    <div class="text-center col-12 block-heading">
    <?php if($sitecode !== "uae") : ?>
        <span>Explore Premium & Luxury  Products From The Overeas Market In India</span>
    <?php else : ?>
        <span>Explore Premium & Luxury  Products</span>
    <?php endif ?>
    </div>
</div>

<!-- <section class="luxury-brands-products mb-5">
    <div class="container">
        
        <div class="products-listing">
            <ul>
                <li>
                    <a href="" title="Blenders &amp; Mixers">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/blenders-mixers.svg" alt="Blenders &amp; Mixers"></span>
                        Blenders &amp; Mixers                        </a>
                </li>
                <li>
                    <a href="" title="Vacuum Cleaners">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/vaccuum-cleaners.svg" alt="Vacuum Cleaners"></span>
                        Vacuum Cleaners                        </a>
                </li>
                
                <li>
                    <a href="" title="Hair Care">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/hair-care.svg" alt="Hair Care"></span>
                        Hair Care                        </a>
                </li>
                
                <li>
                    <a href="" title="Exercise Bikes">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/exercise-bikes.svg" alt="Exercise Bikes"></span>
                        Exercise Bikes                        </a>
                </li>
                <li>
                    <a href="" title="Camping Accessories">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/camping-accessories.svg" alt="Camping Accessories"></span>
                        Camping Accessories                        </a>
                </li>
                <li>
                    <a href="" title="Girls Athletic Shoes">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/girls-athletic.svg" alt="Girls Athletic Shoes"></span>
                        Girls Athletic Shoes                        </a>
                </li>
                <li>
                    <a href="" title="Dog Supplies">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/dog-supplies.svg" alt="Dog Supplies"></span>
                        Dog Supplies                        </a>
                </li>
                <li>
                    <a href="" title="Men's Body Sprays">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/mens-body-sprays.svg" alt="Men's Body Sprays"></span>
                        Men's Body Sprays                        </a>
                </li>
                <li>
                    <a href="" title="Smart Watches">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/smart-watches.svg" alt="Smart Watches"></span>
                        Smart Watches                        </a>
                </li>
                <li>
                    <a href="" title="Dinnerware">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/dinnerware.svg" alt="Dinnerware"></span>
                        Dinnerware                        </a>
                </li>
                <li>
                    <a href="" title="LED Strip Lights">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/led-lights.svg" alt="LED Strip Lights"></span>
                        LED Strip Lights                        </a>
                </li>
                <li>
                    <a href="" title="Gardening Hand Tools">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/gardening-hand-tools.svg" alt="Gardening Hand Tools"></span>
                        Gardening Hand Tools                        </a>
                </li>
                <li>
                    <a href="" title="Women's Swimwear">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/womens-swimwear.svg" alt="Gardening Hand Tools"></span>
                        Women's Swimwear                        </a>
                </li>
                <li>
                    <a href="" title="Baby Feeding Supplies">
                        <span class="icon-sec"><img src="../vendor/shop/themes/cliqnshop/assets/img/branded-cat/baby-feeding-supplies.svg" alt="Baby Feeding Supplies"></span>
                        Baby Feeding Supplies                        </a>
                </li>
                
            </ul>
        </div>
    </div>
</section> -->


<?php if( isset( $this->treeCatalogTree ) ) : ?>

    <section class="luxury-brands-products ">
    <div class="container">
        
        <div class="products-listing">
            <ul>
                
                <?= $this->partial(
				$this->config( 'client/html/additional/catlistcontainer/treeprinter/partial', 'additional/catlistcontainer/treeprinter-partial' ), [
					'nodes' => $this->treeCatalogTree->getChildren(),
					'path' => $this->get( 'treeCatalogPath', map() ),
					'params' => [],
					'level' => 1
				] ) ?>

            </ul>
        </div>
    </div>
    </section>
    

<?php endif ?>  


