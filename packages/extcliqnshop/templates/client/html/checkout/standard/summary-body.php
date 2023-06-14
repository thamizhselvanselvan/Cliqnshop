<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();

$checkoutAddressUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'address'] );
$checkoutDeliveryUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'delivery'] );
$checkoutPaymentUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'payment'] );
$basketUrl = $this->link( 'client/html/basket/standard/url' );


?>
<?php $this->block()->start( 'checkout/standard/summary' ) ?>
<section class="checkout-standard-summary common-summary">
	<input type="hidden" name="<?= $enc->attr( $this->formparam( ['cs_order'] ) ) ?>" value="1">

	<h1><?= $enc->html( $this->translate( 'client', 'summary' ), $enc::TRUST ) ?></h1>
	<p class="note"><?= $enc->html( $this->translate( 'client', 'Please check your order' ), $enc::TRUST ) ?></p>


	<div class="common-summary-address row">
		<div class="item payment <?= !$this->value( $this->get( 'summaryErrorCodes', [] ), 'address/payment' ) ?: 'error' ?> ">
			<div class="header px-0 pt-0">
				<a class="modify" href="<?= $enc->attr( $checkoutAddressUrl ) ?>">
					<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>' ), $enc::TRUST ) ?>
				</a>
				<h3><?= $enc->html( $this->translate( 'client', 'Billing address' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<?php if( $addresses = $this->standardBasket->getAddress( 'payment' ) ) : ?>
					<?= $this->partial(
						/** client/html/checkout/standard/summary/address
						 * Location of the address partial template for the checkout summary
						 *
						 * To configure an alternative template for the address partial, you
						 * have to configure its path relative to the template directory
						 * (usually client/html/templates/). It's then used to display the
						 * payment or delivery address block on the summary page during the
						 * checkout process.
						 *
						 * @param string Relative path to the address partial
						 * @since 2017.01
						 * @see client/html/checkout/standard/summary/detail
						 * @see client/html/checkout/standard/summary/options
						 * @see client/html/checkout/standard/summary/service
						 */
						$this->config( 'client/html/checkout/standard/summary/address', 'common/summary/address' ),
						['addresses' => $addresses]
					) ?>
				<?php endif ?>
			</div>
		</div><!--

		--><div class="item delivery <?= !$this->value( $this->get( 'summaryErrorCodes', [] ), 'address/delivery' ) ?: 'error' ?>">
			<div class="header px-0 pt-0">
				<a class="modify" href="<?= $enc->attr( $checkoutAddressUrl ) ?>">
					<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>
					' ), $enc::TRUST ) ?>
				</a>
				<h3><?= $enc->html( $this->translate( 'client', 'Delivery address' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<?php if( $addresses = $this->standardBasket->getAddress( 'delivery' ) ) : ?>
					<?= $this->partial(
						$this->config( 'client/html/checkout/standard/summary/address', 'common/summary/address' ),
						['addresses' => $addresses]
					) ?>
				<?php else : ?>
					<?= $enc->html( $this->translate( 'client', 'like billing address' ), $enc::TRUST ) ?>
				<?php endif ?>
			</div>
		</div>
	</div>


	<div class="common-summary-service row">
		<div class="item delivery <?= !$this->value( $this->get( 'summaryErrorCodes', [] ), 'service/delivery' ) ?: 'error' ?>">
			<div class="header px-0 pt-0">
				<a class="modify" href="<?= $enc->attr( $checkoutDeliveryUrl ) ?>">
					<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>
					' ), $enc::TRUST ) ?>
				</a>
				<h3><?= $enc->html( $this->translate( 'client', 'delivery' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<?php if( $services = $this->standardBasket->getService( 'delivery' ) ) : ?>
					<?= $this->partial(
						/** client/html/checkout/standard/summary/service
						 * Location of the service partial template for the checkout summary
						 *
						 * To configure an alternative template for the service partial, you
						 * have to configure its path relative to the template directory
						 * (usually client/html/templates/). It's then used to display the
						 * payment or delivery service block on the summary page during the
						 * checkout process.
						 *
						 * @param string Relative path to the service partial
						 * @since 2017.01
						 * @see client/html/checkout/standard/summary/address
						 * @see client/html/checkout/standard/summary/detail
						 * @see client/html/checkout/standard/summary/options
						 */
						$this->config( 'client/html/checkout/standard/summary/service', 'common/summary/service' ),
						['service' => $services, 'type' => 'delivery']
					) ?>
				<?php endif ?>
			</div>
		</div><!--

		--><div class="item payment <?= !$this->value( $this->get( 'summaryErrorCodes', [] ), 'service/payment' ) ?: 'error' ?>">
			<div class="header px-0 pt-0">
				<a class="modify" href="<?= $enc->attr( $checkoutPaymentUrl ) ?>">
					<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>' ), $enc::TRUST ) ?>
				</a>
				<h3><?= $enc->html( $this->translate( 'client', 'payment' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<?php if( $services = $this->standardBasket->getService( 'payment' ) ) : ?>
					<?= $this->partial(
						$this->config( 'client/html/checkout/standard/summary/service', 'common/summary/service' ),
						['service' => $services, 'type' => 'payment']
					) ?>
				<?php endif ?>
			</div>
		</div>

	</div>


	<div class="common-summary-additional row">
		<div class="item coupon <?= !$this->value( $this->get( 'summaryErrorCodes', [] ), 'coupon' ) ?: 'error' ?>">
			<div class="header px-0 pt-0">
				<a class="modify" href="<?= $enc->attr( $basketUrl ) ?>">
					<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>' ), $enc::TRUST ) ?>
				</a>
				<h3><?= $enc->html( $this->translate( 'client', 'Coupon codes' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<?php if( !( $coupons = $this->standardBasket->getCoupons() )->isEmpty() ) : ?>
					<ul class="attr-list">
						<?php foreach( $coupons as $code => $products ) : ?>
							<li class="attr-item"><?= $enc->html( $code ) ?></li>
						<?php endforeach ?>
					</ul>
				<?php endif ?>
			</div>
		</div><!--

		--><div class="item customerref">
		<div class="header px-0 pt-0">
				<h3><?= $enc->html( $this->translate( 'client', 'Your reference' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<input class="customerref-value" name="<?= $this->formparam( array( 'cs_customerref' ) ) ?>" value="<?= $enc->attr( $this->standardBasket->getCustomerReference() ) ?>">
			</div>
		</div><!--

		--><div class="item comment">
			<div class="header px-0 pt-0">
				<h3><?= $enc->html( $this->translate( 'client', 'Your comment' ), $enc::TRUST ) ?></h3>
			</div>

			<div class="content p-0 m-0">
				<textarea class="comment-value" name="<?= $this->formparam( array( 'cs_comment' ) ) ?>"><?= $enc->html( $this->standardBasket->getComment() ) ?></textarea>
			</div>
		</div>
	</div>


	<div class="checkout-standard-summary-option row">
		<?= $this->partial(
			/** client/html/checkout/standard/summary/options
			 * Location of the options partial template for the checkout summary
			 *
			 * To configure an alternative template for the options partial, you
			 * have to configure its path relative to the template directory
			 * (usually client/html/templates/). It's then used to display the
			 * options block on the summary page during the checkout process.
			 *
			 * @param string Relative path to the options partial
			 * @since 2017.01
			 * @see client/html/checkout/standard/summary/address
			 * @see client/html/checkout/standard/summary/detail
			 * @see client/html/checkout/standard/summary/service
			 */
			$this->config( 'client/html/checkout/standard/summary/options', 'checkout/standard/option-partial' ),
			['standardBasket' => $this->standardBasket, 'errors' => $this->get( 'summaryErrorCodes', [] )]
		) ?>
	</div>


	<div class="common-summary-detail row">
		<div class="header">
			<a class="modify" href="<?= $enc->attr( $basketUrl ) ?>">
				<?= $enc->html( $this->translate( 'client', '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg>' ), $enc::TRUST ) ?>
			</a>
			<h2><?= $enc->html( $this->translate( 'client', 'Details' ), $enc::TRUST ) ?></h2>
		</div>

		<div class="basket table-responsive">
			<?= $this->partial(
				/** client/html/checkout/standard/summary/detail
				 * Location of the detail partial template for the checkout summary
				 *
				 * To configure an alternative template for the detail partial, you
				 * have to configure its path relative to the template directory
				 * (usually client/html/templates/). It's then used to display the
				 * product detail block on the summary page during the checkout process.
				 *
				 * @param string Relative path to the detail partial
				 * @since 2017.01
				 * @see client/html/checkout/standard/summary/address
				 * @see client/html/checkout/standard/summary/options
				 * @see client/html/checkout/standard/summary/service
				 */
				$this->config( 'client/html/checkout/standard/summary/detail', 'common/summary/detail' ),
				['summaryBasket' => $this->standardBasket]
			) ?>
		</div>
	</div>


	<div class="button-group">
		<a class="btn btn-default btn-lg btn-back" href="<?= $enc->attr( $this->get( 'standardUrlBack' ) ) ?>">
			<?= $enc->html( $this->translate( 'client', 'Back' ), $enc::TRUST ) ?>
		</a>
		<button class="btn btn-primary btn-lg btn-action">
			<?= $enc->html( $this->translate( 'client', 'Buy now' ), $enc::TRUST ) ?>
		</button>
	</div>

</section>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'checkout/standard/summary' ) ?>
