<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

/* Available data:
 * - orderItem : Order item (optional, only available after checkout)
 * - summaryBasket : Order base item (basket) including products, addresses, services, etc.
 * - summaryEnableModify : True if users are allowed to change the basket content, false if not (optional)
 * - summaryErrorCodes : List of error codes including those for the products (optional)
 */


$totalQuantity = 0;
$enc = $this->encoder();

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', array( 'absoluteUri' => 1 ) );


/** client/html/account/download/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.02
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/action
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/action
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  client/html/<clientname>/url/config = array( 'absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/action
 */

/** client/html/common/summary/detail/product/attribute/types
 * List of attribute type codes that should be displayed in the basket along with their product
 *
 * The products in the basket can store attributes that exactly define an ordered
 * product or which are important for the back office. By default, the product
 * variant attributes are always displayed and the configurable product attributes
 * are displayed separately.
 *
 * Additional attributes for each ordered product can be added by basket plugins.
 * Depending on the attribute types and if they should be shown to the customers,
 * you need to extend the list of displayed attribute types ab adding their codes
 * to the configurable list.
 *
 * @param array List of attribute type codes
 * @since 2014.09
 */
$attrTypes = $this->config( 'client/html/common/summary/detail/product/attribute/types', ['variant', 'config', 'custom'] );


$price = $this->summaryBasket->getPrice();
$precision = $price->getPrecision();
$priceTaxflag = $price->getTaxFlag();
$priceCurrency = $this->translate( 'currency', $price->getCurrencyId() );


/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $this->translate( 'client/code', 'price:default', null, 0, false ) ?: $this->translate( 'client', '%1$s %2$s' );
/// Tax format with tax rate (%1$s) and tax name (%2$s)
$taxFormatIncl = $this->translate( 'client', 'Incl. %1$s%% %2$s' );
/// Tax format with tax rate (%1$s) and tax name (%2$s)
$taxFormatExcl = $this->translate( 'client', '+ %1$s%% %2$s' );

$modify = $this->get( 'summaryEnableModify', false );
$errors = $this->get( 'summaryErrorCodes', [] );


$empty_cart_messages = [
    "Looks like you haven't added anything to your cart yet.",
    "Start shopping now to fill up your cart!",
    "Your cart is feeling a bit lonely right now.",
    "There's nothing in your cart. Why not check out our latest deals?",
    "Your cart is waiting for you to add something awesome to it!",
    "No items in your cart. Why not add something to make your day?",
    "Oops! Your cart is empty. Let's fill it up with some great products.",
    "Looks like you haven't found anything you like yet. Keep browsing!",
    "Nothing in your cart yet. Keep exploring our products!",
    "Your cart is craving some items. Why not give it some love?",
    "Hurry up and fill up your cart before your favorites sell out!",
    "Your cart is currently empty. Time to stock up!",
    "Empty cart, empty heart. Let's add something to it!",
    "Don't let an empty cart hold you back. Start adding items now!",
    "Your cart is looking pretty lonely. Let's add some items to it!",
    "No items in your cart yet. But don't worry, we have plenty to choose from!",
    "You're missing out! Add some amazing items to your cart today.",
    "There's nothing in your cart. But it's not too late to start shopping!",
    "Your cart is feeling light. Let's add some weight to it!",
    "Don't leave your cart empty-handed. Add something today!",
    "Zero items in your cart. But the possibilities are endless!",
    "Your cart is currently empty. But it's never too late to start shopping.",
    "Nothing in your cart yet. But we have a feeling you'll find something soon!",
    "Your cart is waiting for you to add some awesome products.",
    "You haven't added anything to your cart yet. But it's never too late to start!",
    "Empty cart alert! Start adding items now to get the best deals.",
    "Your cart is empty. But don't worry, we have plenty of products to choose from.",
    "No items in your cart. But that doesn't mean you can't find something you love!",
];
 

?>
<div>

    <table>
        <colgroup class="table-row">
            <col span="1" class="table-col-1">
            <col span="1" class="table-col-2">
            <col span="1" class="table-col-3">
            <col span="1" class="table-col-4">
            <col span="1" class="table-col-5">
        </colgroup>
        <thead class="headline">
            <tr>
                <th scope="col"></th>
                <th scope="col">
                    <div class="quantity"><?= $enc->html( $this->translate( 'client', 'Quantity' ), $enc::TRUST ) ?></div>
                </th>
                <th scope="col">
                    <div class="unitprice"><?= $enc->html( $this->translate( 'client', 'Price' ), $enc::TRUST ) ?></div>
                </th>
                <th scope="col">
                    <div class="price"><?= $enc->html( $this->translate( 'client', 'Sum' ), $enc::TRUST ) ?></div>
                </th>
                <th scope="col">
                    <?php if( $modify ) : ?>
                        <div class="action"></div>
                    <?php endif ?>
                </th>
            </tr>
        </thead>
        <tbody>
            
                <?php  if( count($this->summaryBasket->getProducts()) <=0) :  ?>
                    <tr class="product-item ">
                        <td data-label="" class="product-item-detail" colspan="5">
                            <?php  if(Auth::guest()) : ?>
                                <div class="row">
                                    <div class="col-md-12 missing-cart">
                                        <img src="<?php echo asset('../vendor/shop/themes/cliqnshop/assets/img/missing-cart.svg')?>" class="">
                                        <div class="title">Missing Cart items?</div>
                                        <div class="description">Login to see the items you added previously</div>
                                        <a href="<?= airoute( 'login' ) ?>" class="pure-material-button-contained" >Login Now</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="row">
                                    <div class="col-md-12 missing-cart">
                                        <img src="<?php echo asset('../vendor/shop/themes/cliqnshop/assets/img/missing-cart.svg')?>" class="">
                                        <div class="title">Empty Cart..!</div>
                                        <div class="description"><?= $empty_cart_messages[array_rand($empty_cart_messages,1)]  ?></div>
                                        <a href="<?= airoute( 'aimeos_shop_list' ) ?>" class="pure-material-button-contained" >Shop Now</a>
                                        
                                    </div>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endif ?>
            

            <?php foreach( $this->summaryBasket->getProducts()->groupBy( 'order.base.product.vendor' )->ksort() as $vendor => $list ) : ?>
                <?php if( $vendor ) : ?>
                    <div class="supplier">
                        <h3 class="supplier-name">
                            <?= $enc->html( $vendor ) ?>
                        </h3>
                    </div>
                <?php endif ?>

                <?php foreach( $list as $position => $product ) : $totalQuantity += $product->getQuantity() ?>
                    <tr class="product-item <?= ( isset( $errors['product'][$position] ) ? 'error' : '' ) ?>">
                        <td data-label="" class="product-item-detail">
                            <div class="">
                                <div class="row g-0">
                                    <div class="status">
                                        <?php if( ( $status = $product->getStatusDelivery() ) >= 0 ) : $key = 'stat:' . $status ?>
                                        <?= $enc->html( $this->translate( 'mshop/code', $key ) ) ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="image">
                                        <?php if( ( $url = $product->getMediaUrl() ) != '' ) : ?>
                                        <img class="detail" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="details">
                                        <?php
                                                $url = '#';

                                                if( ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 )
                                                {
                                                    $params = ['d_name' => $product->getName( 'url' ), 'd_prodid' => $product->getParentProductId() ?: $product->getProductId(), 'd_pos' => ''];
                                                    $url = $this->url( ( $product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );
                                                }
                                            ?>
                                        <a class="product-name" href="<?= $enc->attr( $url ) ?>">
                                            <?= $enc->html( $product->getName(), $enc::TRUST ) ?>
                                        </a>
                                        <p class="code">
                                            <span class="name">
                                                <?= $enc->html( $this->translate( 'client', 'Article no.' ), $enc::TRUST ) ?>
                                            </span>
                                            <span class="value">
                                                <?= $product->getProductCode() ?>
                                            </span>
                                        </p>
                                        <?php if( ( $desc = $product->getDescription() ) !== '' ) : ?>
                                        <p class="product-description">
                                            <?= $enc->html( $desc ) ?>
                                        </p>
                                        <?php endif ?>
                                        <?php foreach( $attrTypes as $attrType ) : ?>
                                        <?php if( !( $attributes = $product->getAttributeItems( $attrType ) )->isEmpty() ) : ?>
                                        <ul class="attr-list attr-type-<?= $enc->attr( $attrType ) ?>">
                                            <?php foreach( $product->getAttributeItems( $attrType ) as $attribute ) : ?>
                                            <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                <span class="name">
                                                    <?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ) ?>
                                                </span>
                                                <span class="value">
                                                    <?php if( $attribute->getQuantity() > 1 ) : ?>
                                                    <?= $enc->html( $attribute->getQuantity() ) ?>×
                                                    <?php endif ?>
                                                    <?= $enc->html( $attrType !== 'custom' && $attribute->getName() ? $attribute->getName() : $attribute->getValue() ) ?>
                                                </span>
                                            </li>
                                            <?php endforeach ?>
                                        </ul>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                        <?php if( isset( $this->orderItem ) && $this->orderItem->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED
                                                    && ( $product->getStatusPayment() < 0 || $product->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED )
                                                    && ( $attribute = $product->getAttributeItem( 'download', 'hidden' ) ) ) : ?>
                                        <ul class="attr-list attr-list-hidden">
                                            <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                <span class="name">
                                                    <?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ) ?>
                                                </span>
                                                <span class="value">
                                                    <a
                                                        href="<?= $enc->attr( $this->link( 'client/html/account/download/url', ['dl_id' => $attribute->getId()] ) ) ?>">
                                                        <?= $enc->html( $attribute->getName() ) ?>
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                        <?php endif ?>
                                        <?php if( ( $timeframe = $product->getTimeframe() ) !== '' ) : ?>
                                        <p class="timeframe">
                                            <span class="name">
                                                <?= $enc->html( $this->translate( 'client', 'Delivery within' ) ) ?>
                                            </span>
                                            <span class="value">
                                                <?= $enc->html( $timeframe ) ?>
                                            </span>
                                        </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td data-label="Quantity">
                            <div class="quantity">
                                <?php if( $modify && ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>

                                <?php if( $product->getQuantity() > 1 ) : ?>
                                <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $position, 'b_quantity' => $product->getQuantity() - 1 ) ?>
                                <a class="minibutton change down"
                                    href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>">−</a>
                                <?php else : ?>
                                &nbsp;
                                <?php endif ?>

                                <input class="value" type="number" required="required"
                                    name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'quantity' ) ) ) ?>"
                                    value="<?= $enc->attr( $product->getQuantity() ) ?>"
                                    step="<?= $enc->attr( $product->getScale() ) ?>"
                                    min="<?= $enc->attr( $product->getScale() ) ?>" max="2147483647">
                                <input type="hidden" type="text"
                                    name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'position' ) ) ) ?>"
                                    value="<?= $enc->attr( $position ) ?>">

                                <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $position, 'b_quantity' => $product->getQuantity() + 1 ) ?>
                                <a class="minibutton change up"
                                    href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>">+</a>

                                <?php else : ?>
                                <?= $enc->html( $product->getQuantity() ) ?>
                                <?php endif ?>
                            </div>
                        </td>
                        <td data-label="Price">
                            <div class="unitprice">
                                <?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue(), $precision ), $priceCurrency ) ) ?>
                            </div>
                        </td>
                        <td data-label="Sum">
                            <div class="price">
                                <?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $precision ), $priceCurrency ) ) ?>
                            </div>
                        </td>
                        <td data-label="">
                            <?php if( $modify ) : ?>
                            <div class="action">
                                <?php if( ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>
                                <?php $basketParams = array( 'b_action' => 'delete', 'b_position' => $position ) ?>
                                <a class="minibutton delete"
                                    href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"></a>
                                <?php endif ?>
                            </div>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>

            <?php endforeach ?>
        </tbody>
    </table>


    <?php foreach( $this->summaryBasket->getService( 'delivery' ) as $service ) : ?>
    <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice() ?>
    <?php $price = $enc->html( sprintf( $priceFormat, $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $priceItem->getCurrencyId() ) ) ?>
        <div class="delivery row g-0">
            <div class="col-7 col-md-6">
                <div class="row g-0">
                    <div class="status col-1"></div>
                    <div class="image col-11 col-lg-3">
                        <?php if( ( $url = $service->getMediaUrl() ) != '' ) : ?>
                        <img class="detail" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                        <?php endif ?>
                    </div>
                    <div class="details col-12 col-lg-8">
                        <?= $enc->html( $service->getName() ) ?>
                    </div>
                </div>
            </div>
            <div class="col-5 col-md-6">
                <div class="row g-0">
                    <div class="quantity col-4">1</div>
                    <div class="unitprice col-4">
                        <?= $price ?>
                    </div>
                    <div class="price col-3">
                        <?= $price ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php endforeach ?>

    <?php foreach( $this->summaryBasket->getService( 'payment' ) as $service ) : ?>
    <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice() ?>
    <?php $price = $enc->html( sprintf( $priceFormat, $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $priceItem->getCurrencyId() ) ) ?>
        <div class="payment row g-0">
            <div class="col-8 col-md-6">
                <div class="row g-0">
                    <div class="status col-1"></div>
                    <div class="image col-11 col-lg-3">
                        <?php if( ( $url = $service->getMediaUrl() ) != '' ) : ?>
                        <img class="detail" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                        <?php endif ?>
                    </div>
                    <div class="details col-12 col-lg-8">
                        <?= $enc->html( $service->getName() ) ?>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-6">
                <div class="row g-0">
                    <div class="quantity col-4">1</div>
                    <div class="unitprice col-4">
                        <?= $price ?>
                    </div>
                    <div class="price col-3">
                        <?= $price ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>

    <?php endif ?>
    <?php endforeach ?>

    <?php if( $priceTaxflag === false || $this->summaryBasket->getPrice()->getCosts() > 0 ) : ?>
        <div class="subtotal row g-0">
            <div class="col-8 col-md-6 offset-4 offset-md-6">
                <div class="row g-0">
                    <div class="col-8">
                        <?= $enc->html( $this->translate( 'client', 'Sub-total' ) ) ?>
                    </div>
                    <div class="price col-3">
                        <?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue(), $precision ), $priceCurrency ) ) ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if( ( $costs = $this->summaryBasket->getCosts( 'delivery' ) ) > 0 ) : ?>
        <div class="delivery row g-0">
            <div class="col-8 col-md-6 offset-4 offset-md-6">
                <div class="row g-0">
                    <div class="col-8">
                        <?= $enc->html( $this->translate( 'client', 'Shipping' ) ) ?>
                    </div>
                    <div class="price col-3">
                        <?= $enc->html( sprintf( $priceFormat, $this->number( $costs, $precision ), $priceCurrency ) ) ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if( ( $costs = $this->summaryBasket->getCosts( 'payment' ) ) > 0 ) : ?>
        <div class="payment row g-0">
            <div class="col-8 col-md-6 offset-4 offset-md-6">
                <div class="row g-0">
                    <div class="col-8">
                        <?= $enc->html( $this->translate( 'client', 'Payment costs' ) ) ?>
                    </div>
                    <div class="price col-3">
                        <?= $enc->html( sprintf( $priceFormat, $this->number( $costs, $precision ), $priceCurrency ) ) ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if( $priceTaxflag === true ) : ?>
        <table>
            <colgroup class="price-total-table-row">
                <col span="1" class="table-col-1">
                <col span="1" class="table-col-2">
                <col span="1" class="table-col-3">
            </colgroup>
            <tbody>
                <tr class="total">
                    <td data-label="Quantity">
                        <div class="quantity">
                            <?= $enc->html( sprintf( $this->translate( 'client', '%1$d article', '%1$d articles', $totalQuantity ), $totalQuantity ) ) ?>
                        </div>
                    </td>
                    <td data-label="" class="Total-algin">
                        <div class=" total-text">
                            <?= $enc->html( $this->translate( 'client', 'Total:' ) ) ?>
                        </div>
                        <div class="price fw-bold">
                            <?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?>
                        </div>
                    </td>
                    <td data-label="">
                        <?php if( $modify ) : ?>
                            <div class="action"></div>
                        <?php endif ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>

    <?php foreach( $this->summaryBasket->getTaxes() as $taxName => $map ) : ?>
    <?php foreach( $map as $taxRate => $priceItem ) : ?>
    <?php if( ( $taxValue = $priceItem->getTaxValue() ) > 0 ) : ?>
        <table>
            <colgroup class="tax-table-row">
                <col span="1" class="table-col-1">
                <col span="1" class="table-col-2">
                <col span="1" class="table-col-3">
            </colgroup>
            <tbody class="tax">
                <tr>
                    <td data-label="Tax">
                        <div>
                            <?= $enc->html( sprintf( $priceTaxflag ? $taxFormatIncl : $taxFormatExcl, $this->number( $taxRate ), $this->translate( 'client/code', $taxName ) ) ) ?>
                        </div>
                    </td>
                    <td data-label="price">
                        <div class="price">
                            <?= $enc->html( sprintf( $priceFormat, $this->number( $taxValue, $precision ), $priceCurrency ) ) ?>
                        </div>
                    </td>
                    <td data-label="">
                        <?php if( $modify ) : ?>
                            <div class="action"></div>
                        <?php endif ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>
    <?php endforeach ?>
    <?php endforeach ?>

    <?php if( $priceTaxflag === false ) : ?>
        <div class="total row g-0">
            <div class="col-8 col-md-6 offset-4 offset-md-6">
                <div class="row g-0">
                    <div class="quantity col-4">
                        <?= $enc->html( sprintf( $this->translate( 'client', '%1$d article', '%1$d articles', $totalQuantity ), $totalQuantity ) ) ?>
                    </div>
                    <div>
                        <?= $enc->html( $this->translate( 'client', 'Total' ) ) ?>
                    </div>
                    <div class="price col-4 offset-3">
                        <?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts() + $this->summaryBasket->getPrice()->getTaxValue(), $precision ), $priceCurrency ) ) ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if( $this->summaryBasket->getPrice()->getRebate() > 0 ) : ?>
        <div class="rebate row g-0">
            <div class="col-8 col-md-6 offset-4 offset-md-6">
                <div class="row g-0">
                    <div class="quantity col-4">
                        <?= $enc->html( $this->translate( 'client', 'Included rebates' ) ) ?>
                    </div>
                    <div class="price col-4 offset-3">
                        <?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getRebate(), $precision ), $priceCurrency ) ) ?>
                    </div>
                    <?php if( $modify ) : ?>
                    <div class="action col-1"></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    <?php endif ?>

</div>




<style>
    /* product-item-detail start */
    table .table-row .table-col-1 {
        width: 50%;
    }

    table .table-row .table-col-2 {
        width: 15%;
    }

    table .table-row .table-col-3 {
        width: 15%;
    }

    table .table-row .table-col-4 {
        width: 15%;
    }

    table .table-row .table-col-5 {
        width: 5%;
    }
    /* product-item-detail end */

    /* price-total-table start */
    table .price-total-table-row .table-col-1 {
        width: 65%;
    }
    table .price-total-table-row .table-col-2 {
        width: 30%;
    }
    table .price-total-table-row .table-col-3 {
        width: 5%;
    }
    table tbody tr .Total-algin{
        display: flex;
        justify-content: end;
    }
    /* price-total-table end */

    table .tax-table-row .table-col-1{
        width: 80%;
    }
    table .tax-table-row .table-col-2{
        width: 15%;
    }
    table .tax-table-row .table-col-3{
        width: 5%;
    }
    table {
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table thead tr {
        background: var(--ai-my-primarygray-color);
    }

    table tbody tr {
        border-bottom: 1px solid #e3e9ed;
        padding: .35em;
    }
    table tbody tr .product-item-detail:first-child{
        text-align: start;
    }
    table th,
    table td {
        padding: .625em;
        text-align: end;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
    }

    @media screen and (max-width: 768px) {
        table .table-row .table-col-1,table .price-total-table-row .table-col-1,table .tax-table-row .table-col-1 {
            width: 100%;
        }

        table .table-row .table-col-2,
        table .table-row .table-col-3,
        table .table-row .table-col-4,
        table .table-row .table-col-5,
        table .price-total-table-row .table-col-2,
        table .price-total-table-row .table-col-3,
        table .tax-table-row .table-col-2,
        table .tax-table-row .table-col-3 {
            width: inherit;
        }

        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tbody td .action,
        table tbody td .quantity {
            text-align: end !important;
        }

        table tr {
            border: 1px solid #e3e9ed;
            border-radius: 5px;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            display: block;
            font-size: .8em;
        }

        table td::before {
            /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
            content: attr(data-label);
            float: left;
            font-size: 12px;
            color: #9f9c9c;
        }
        table td .unitprice,table td .price,table td .quantity{
            font-weight: 600;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }
</style>