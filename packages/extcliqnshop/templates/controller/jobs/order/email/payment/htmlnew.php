<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2019-2022
 */

/** Available data
 * - orderItem: Order Item
 * - addressItem: Billing address item
 * - summaryBasket : Order base item (basket) with addresses, services, products, etc.
 */

$enc = $this->encoder();

$key = 'pay:' . $this->orderItem->getStatusPayment();
$orderStatus = $this->translate( 'mshop/code', $key );
$orderDate = date_create( $this->orderItem->getTimeCreated() )->format( $this->translate( 'controller/jobs', 'Y-m-d' ) );

/// Price format with price value (%1$s) and currency (%2$s)
$pricefmt = $this->translate( 'controller/jobs', 'price:default' );
$pricefmt = ( $pricefmt === 'price:default' ? $this->translate( 'controller/jobs', '%1$s %2$s' ) : $pricefmt );


?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>
        <?= $enc->html( sprintf( $this->translate( 'controller/jobs', 'Your order %1$s' ), $this->orderItem->getOrderNumber() ) ) ?>
    </title><!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass * {
            line-height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        p {
            display: block;
            margin: 13px 0;
        }
    </style><!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }

            @viewport {
                width: 320px;
            }
        }
    </style><!--<![endif]--><!--[if mso]>
        <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG/>
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
        </xml>
        <![endif]--><!--[if lte mso 11]>
        <style type="text/css">
          .outlook-group-fix { width:100% !important; }
        </style>
        <![endif]--><!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    </style><!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100% !important;
                max-width: 100%;
            }

            .mj-column-per-50 {
                width: 50% !important;
                max-width: 50%;
            }

            .mj-column-per-33 {
                width: 33.333333333333336% !important;
                max-width: 33.333333333333336%;
            }
        }
		td div .p-m-item{
			border-bottom:none !important;
			font-size: 13px;
			padding: 10px 10px 0px 10px !important;
			margin: 0 !important;
			font-weight: 600;
		}
		td div .content{
			font-size: 12px;
			line-height: 20px;
			color: #606060;
			padding: 10px !important;
			margin: 0 !important;
		}
		.product .label .product-name{
			font-size: 12px;
			color: #606060;
			line-height: 18px;
		}
		.product .label .code .name{
			color: #9f9c9c;
		}
		.common-summary table tbody tr .p-m-grid{
			display: flex;
		}
		@media only screen and (max-width:768px){
			.common-summary table tbody tr .p-m-grid{
			display: block;
		}
		}
		.common-summary table tbody tr .p-m-grid >div{
			background: #FCFCFC;
    		border: 2px solid #F1F1F1;
			border-radius: 5px;
			margin: 5px;
		}
    </style>
    <style type="text/css">
        @media only screen and (max-width:480px) {
            table.full-width-mobile {
                width: 100% !important;
            }

            td.full-width-mobile {
                width: auto !important;
            }
        }
    </style>
    <style type="text/css">
        <?=$this->get('css') ?>
    </style>
</head>

<body>
    <div class="aimeos">
        <!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="center" class="logo"
                                            style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                                style="border-collapse:collapse;border-spacing:0px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:550px;"><img height="auto"
                                                                src="<?= $this->get( 'logo' ) ?>"
                                                                style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;max-width: 150px;max-height: 150px;"
                                                                width="550"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" class="email-common-salutation"
                                            style="font-size:0px;padding:5px 0px;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <?php switch( $this->addressItem->getSalutation() ) : case 'mr': ?>
                                                <?= $enc->html( sprintf( $this->translate( 'controller/jobs', 'Dear Mr %1$s %2$s' ), $this->addressItem->getFirstName(), $this->addressItem->getLastName() ) ) ?>
                                                <?php break; case 'ms': ?>
                                                <?= $enc->html( sprintf( $this->translate( 'controller/jobs', 'Dear Ms %1$s %2$s' ), $this->addressItem->getFirstName(), $this->addressItem->getLastName() ) ) ?>
                                                <?php break; default: ?>
                                                <?= $enc->html( sprintf( $this->translate( 'controller/jobs', 'Dear %1$s %2$s' ), $this->addressItem->getFirstName(), $this->addressItem->getLastName() ) ) ?>
                                                <?php endswitch ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left" class="email-common-intro"
                                            style="font-size:0px;padding:10px 0px;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <?php switch( $this->orderItem->getStatusPayment() ) : case 3: /// Payment e-mail intro with order ID (%1$s) and order date (%2$s) ?>
                                                <?= sprintf( $this->translate( 'controller/jobs', 'The payment for your order %1$s from %2$s has been refunded.' ), $this->orderItem->getOrderNumber(), $orderDate, $orderStatus ) ?>
                                                <?php break; case 4: /// Payment e-mail intro with order ID (%1$s), order date (%2$s) and payment status (%3$s) ?>
                                                <?= sprintf( $this->translate( 'controller/jobs', 'The order is pending until we receive the final payment. If you\'ve chosen to pay in advance, please transfer the money to our bank account with the order ID %1$s as reference.' ), $this->orderItem->getOrderNumber(), $orderDate, $orderStatus ) ?>
                                                <?php break; case 5: /// Payment e-mail intro with order ID (%1$s), order date (%2$s) and payment status (%3$s) ?>
                                                <?= sprintf( $this->translate( 'controller/jobs', 'Thank you for your order %1$s from %2$s.' ), $this->orderItem->getOrderNumber(), $orderDate, $orderStatus ) ?>
                                                <?php break; case 6: /// Payment e-mail intro with order ID (%1$s), order date (%2$s) and payment status (%3$s) ?>
                                                <?= sprintf( $this->translate( 'controller/jobs', 'We have received your payment, and will take care of your order immediately.' ), $this->orderItem->getOrderNumber(), $orderDate, $orderStatus ) ?>
                                                <?php break; default: /// Payment e-mail intro with order ID (%1$s), order date (%2$s) and payment status (%3$s) ?>
                                                <?= sprintf( $this->translate( 'controller/jobs', 'The payment status of your order %1$s from %2$s has been changed to "%3$s".' ), $this->orderItem->getOrderNumber(), $orderDate, $orderStatus ) ?>
                                                <?php endswitch ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="common-summary-outlook common-summary-address-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="common-summary common-summary-address" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="p-m-grid" style="direction:ltr;font-size:0px; 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="item-outlook payment-outlook" style="vertical-align:top;width:300px;" ><![endif]-->
                            <div class=" outlook-group-fix item payment"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'Billing address' ), $enc::TRUST ) ?>
                                                </h3>
                                                <?php foreach( $this->summaryBasket->getAddress( 'payment' ) as $addr ) : ?>
                                                <div class="content">
                                                    <?= preg_replace( ["/\n+/m", '/ +/'], ['<br/>', ' '], trim( $enc->html( sprintf(
						/// Address format with company (%1$s), salutation (%2$s), title (%3$s), first name (%4$s), last name (%5$s),
						/// address part one (%6$s, e.g street), address part two (%7$s, e.g house number), address part three (%8$s, e.g additional information),
						/// postal/zip code (%9$s), city (%10$s), state (%11$s), country (%12$s), language (%13$s),
						/// e-mail (%14$s), phone (%15$s), facsimile/telefax (%16$s), web site (%17$s), vatid (%18$s)
						$this->translate( 'controller/jobs', '%1$s
%2$s %3$s %4$s %5$s
%6$s %7$s
%8$s
%9$s %10$s
%11$s
%12$s
%13$s
%14$s
%15$s
%16$s
%17$s
%18$s
'
						),
						$addr->getCompany(),
						$this->translate( 'mshop/code', $addr->getSalutation() ),
						$addr->getTitle(),
						$addr->getFirstName(),
						$addr->getLastName(),
						$addr->getAddress1(),
						$addr->getAddress2(),
						$addr->getAddress3(),
						$addr->getPostal(),
						$addr->getCity(),
						$addr->getState(),
						$this->translate( 'country', $addr->getCountryId() ),
						$this->translate( 'language', $addr->getLanguageId() ),
						$addr->getEmail(),
						$addr->getTelephone(),
						$addr->getTelefax(),
						$addr->getWebsite(),
						$addr->getVatID()
					) ) ) ) ?>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]></td><td class="item-outlook delivery-outlook" style="vertical-align:top;width:300px;" ><![endif]-->
                            <div class=" outlook-group-fix item delivery"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'Delivery address' ), $enc::TRUST ) ?>
                                                </h3>
                                                <?php if( ( $addresses = $this->summaryBasket->getAddress( 'delivery' ) ) !== [] ) : ?>
                                                <?php foreach( $addresses as $addr ) : ?>
                                                <div class="content">
                                                    <?= preg_replace( ["/\n+/m", '/ +/'], ['<br/>', ' '], trim( $enc->html( sprintf(
							/// Address format with company (%1$s), salutation (%2$s), title (%3$s), first name (%4$s), last name (%5$s),
							/// address part one (%6$s, e.g street), address part two (%7$s, e.g house number), address part three (%8$s, e.g additional information),
							/// postal/zip code (%9$s), city (%10$s), state (%11$s), country (%12$s), language (%13$s),
							/// e-mail (%14$s), phone (%15$s), facsimile/telefax (%16$s), web site (%17$s), vatid (%18$s)
							$this->translate( 'controller/jobs', '%1$s
%2$s %3$s %4$s %5$s
%6$s %7$s
%8$s
%9$s %10$s
%11$s
%12$s
%13$s
%14$s
%15$s
%16$s
%17$s
%18$s
'
							),
							$addr->getCompany(),
							$this->translate( 'mshop/code', $addr->getSalutation() ),
							$addr->getTitle(),
							$addr->getFirstName(),
							$addr->getLastName(),
							$addr->getAddress1(),
							$addr->getAddress2(),
							$addr->getAddress3(),
							$addr->getPostal(),
							$addr->getCity(),
							$addr->getState(),
							$this->translate( 'country', $addr->getCountryId() ),
							$this->translate( 'language', $addr->getLanguageId() ),
							$addr->getEmail(),
							$addr->getTelephone(),
							$addr->getTelefax(),
							$addr->getWebsite(),
							$addr->getVatID()
						) ) ) ) ?>
                                                </div>
                                                <?php endforeach ?>
                                                <?php else : ?>
                                                <div class="content">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'like billing address' ), $enc::TRUST ) ?>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="common-summary-outlook common-summary-service-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="common-summary common-summary-service" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="p-m-grid" style="direction:ltr;font-size:0px; 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="item-outlook payment-outlook" style="vertical-align:top;width:300px;" ><![endif]-->
                            <div class=" outlook-group-fix item payment"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'payment' ), $enc::TRUST ) ?>
                                                </h3>
                                                <?php foreach( $this->summaryBasket->getService( 'payment' ) as $service ) : ?>
                                                <div class="content">
                                                    <h4>
                                                        <?= $enc->html( $service->getName() ) ?>
                                                    </h4>
                                                    <?php if( !( $attributes = $service->getAttributeItems() )->isEmpty() ) : ?>
                                                    <ul class="attr-list">
                                                        <?php foreach( $attributes as $attribute ) : ?>
                                                        <?php if( strpos( $attribute->getType(), 'hidden' ) === false ) : ?>
                                                        <li
                                                            class="<?= $enc->attr( 'payment-' . $attribute->getCode() ) ?>">
                                                            <span class="name">
                                                                <?= $enc->html( $attribute->getName() ?: $this->translate( 'controller/jobs', $attribute->getCode() ) ) ?>:
                                                            </span>
                                                            <?php switch( $attribute->getValue() ) : case 'array': case 'object': ?>
                                                            <?php foreach( (array) $attribute->getValue() as $value ) : ?>
                                                            <span class="value">
                                                                <?= $enc->html( $value ) ?>
                                                            </span>
                                                            <?php endforeach ?>
                                                            <?php break; default: ?> <span class="value">
                                                                <?= $enc->html( $attribute->getValue() ) ?>
                                                            </span>
                                                            <?php endswitch ?>
                                                        </li>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                    </ul>
                                                    <?php endif ?>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]></td><td class="item-outlook delivery-outlook" style="vertical-align:top;width:300px;" ><![endif]-->
                            <div class=" outlook-group-fix item delivery"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'delivery' ), $enc::TRUST ) ?>
                                                </h3>
                                                <?php foreach( $this->summaryBasket->getService( 'delivery' ) as $service ) : ?>
                                                <div class="content">
                                                    <h4>
                                                        <?= $enc->html( $service->getName() ) ?>
                                                    </h4>
                                                    <?php if( !( $attributes = $service->getAttributeItems() )->isEmpty() ) : ?>
                                                    <ul class="attr-list">
                                                        <?php foreach( $attributes as $attribute ) : ?>
                                                        <?php if( strpos( $attribute->getType(), 'hidden' ) === false ) : ?>
                                                        <li
                                                            class="<?= $enc->attr( 'delivery-' . $attribute->getCode() ) ?>">
                                                            <span class="name">
                                                                <?= $enc->html( $attribute->getName() ?: $this->translate( 'controller/jobs', $attribute->getCode() ) ) ?>:
                                                            </span>
                                                            <?php switch( $attribute->getValue() ) : case 'array': case 'object': ?>
                                                            <?php foreach( (array) $attribute->getValue() as $value ) : ?>
                                                            <span class="value">
                                                                <?= $enc->html( $value ) ?>
                                                            </span>
                                                            <?php endforeach ?>
                                                            <?php break; default: ?> <span class="value">
                                                                <?= $enc->html( $attribute->getValue() ) ?>
                                                            </span>
                                                            <?php endswitch ?>
                                                        </li>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                    </ul>
                                                    <?php endif ?>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="common-summary-outlook common-summary-additional-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="common-summary common-summary-additional" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="p-m-grid" style="direction:ltr;font-size:0px; 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="item-outlook coupon-outlook" style="vertical-align:top;width:200px;" ><![endif]-->
                            <div class=" outlook-group-fix item coupon"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'Coupon codes' ), $enc::TRUST ) ?>
                                                </h3>
                                                <div class="content">
                                                    <?php if( !( $coupons = $this->summaryBasket->getCoupons() )->isEmpty() ) : ?>
                                                    <ul class="attr-list">
                                                        <?php foreach( $coupons as $code => $products ) : ?>
                                                        <li class="attr-item">
                                                            <?= $enc->html( $code ) ?>
                                                        </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]></td><td class="item-outlook customerref-outlook" style="vertical-align:top;width:200px;" ><![endif]-->
                            <div class=" outlook-group-fix item customerref"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'Your reference' ), $enc::TRUST ) ?>
                                                </h3>
                                                <div class="content">
                                                    <?= $enc->attr( $this->summaryBasket->getCustomerReference() ) ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--[if mso | IE]></td><td class="item-outlook comment-outlook" style="vertical-align:top;width:200px;" ><![endif]-->
                            <div class=" outlook-group-fix item comment"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:inherit;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <h3 class="p-m-item">
                                                    <?= $enc->html( $this->translate( 'controller/jobs', 'Your comment' ), $enc::TRUST ) ?>
                                                </h3>
                                                <div class="content">
                                                    <?= $enc->html( $this->summaryBasket->getComment() ) ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="common-summary-outlook common-summary-detail-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="common-summary common-summary-detail" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" class="basket"
                                            style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <table cellpadding="0" cellspacing="0" width="100%" border="0"
                                                style="cellspacing:0;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;">
                                                <tr class="header">
                                                    <th class="status"></th>
                                                    <th class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Name' ), $enc::TRUST ) ?>
                                                    </th>
                                                    <th class="quantity">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Qty' ), $enc::TRUST ) ?>
                                                    </th>
                                                    <th class="price">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Sum' ), $enc::TRUST ) ?>
                                                    </th>
                                                </tr>
                                                <?php $totalQty = 0 ?>
                                                <?php foreach( $this->summaryBasket->getProducts() as $product ) : $totalQty += $product->getQuantity() ?>
                                                <tr class="body product">
                                                    <td class="status">
                                                        <?php if( ( $status = $product->getStatusDelivery() ) >= 0 ) : $key = 'stat:' . $status ?>
                                                        <?= $enc->html( $this->translate( 'mshop/code', $key ) ) ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="label">
                                                        <?php $params = array_merge( $this->param(), ['d_name' => $product->getName( 'url' ), 'd_prodid' => $product->getParentProductId() ?: $product->getProductId(), 'd_pos' => ''] ) ?>
                                                        <span class="product-name">
                                                            <?= $enc->html( $product->getName(), $enc::TRUST ) ?>
                                                        </span>
                                                        <p class="code"><span class="name">
                                                                <?= $enc->html( $this->translate( 'controller/jobs', 'Article no.' ), $enc::TRUST ) ?>:
                                                            </span><span class="value">
                                                                <?= $product->getProductCode() ?>
                                                            </span></p>
                                                        <?php if( ( $desc = $product->getDescription() ) !== '' ) : ?>
                                                        <p class="product-description">
                                                            <?= $enc->html( $desc ) ?>
                                                        </p>
                                                        <?php endif ?>
                                                        <?php foreach( ['variant', 'config', 'custom'] as $attrType ) : ?>
                                                        <?php if( !( $attributes = $product->getAttributeItems( $attrType ) )->isEmpty() ) : ?>
                                                        <ul class="attr-list attr-type-<?= $enc->attr( $attrType ) ?>">
                                                            <?php foreach( $attributes as $attribute ) : ?>
                                                            <li
                                                                class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                                <span class="name">
                                                                    <?= $enc->html( $this->translate( 'controller/jobs', $attribute->getCode() ) ) ?>:
                                                                </span> <span class="value">
                                                                    <?php if( $attribute->getQuantity() > 1 ) : ?>
                                                                    <?= $enc->html( $attribute->getQuantity() ) ?>×
                                                                    <?php endif ?>
                                                                    <?= $enc->html( $attrType !== 'custom' && $attribute->getName() ? $attribute->getName() : $attribute->getValue() ) ?>
                                                                </span></li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                        <?php if( $this->orderItem->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED
								&& ( $product->getStatusPayment() < 0 || $product->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED )
								&& ( $attribute = $product->getAttributeItem( 'download', 'hidden' ) ) ) : ?>
                                                        <ul class="attr-list attr-list-hidden">
                                                            <li
                                                                class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                                <span class="name">
                                                                    <?= $enc->html( $this->translate( 'controller/jobs', $attribute->getCode() ) ) ?>
                                                                </span><span class="value"><a
                                                                        href="<?= $enc->attr( $this->link( 'client/html/account/download/url', ['dl_id' => $attribute->getId()], ['absoluteUri' => 1] ) ) ?>">
                                                                        <?= $enc->html( $attribute->getName() ) ?>
                                                                    </a></span></li>
                                                        </ul>
                                                        <?php endif ?>
                                                        <?php if( ( $timeframe = $product->getTimeframe() ) !== '' ) : ?>
                                                        <p class="timeframe"><span class="name">
                                                                <?= $enc->html( $this->translate( 'controller/jobs', 'Delivery within' ) ) ?>:
                                                            </span><span class="value">
                                                                <?= $enc->html( $timeframe ) ?>
                                                            </span></p>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $enc->html( $product->getQuantity() ) ?>
                                                    </td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $product->getPrice()->getPrecision() ), $this->translate( 'currency', $product->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach ?>
                                                <?php foreach( $this->summaryBasket->getService( 'delivery' ) as $service ) : ?>
                                                <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice() ?>
                                                <tr class="body delivery">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $service->getName() ) ?>
                                                    </td>
                                                    <td class="quantity">1</td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php endforeach ?>
                                                <?php foreach( $this->summaryBasket->getService( 'payment' ) as $service ) : ?>
                                                <?php if( $service->getPrice()->getValue() > 0 ) : $priceItem = $service->getPrice() ?>
                                                <tr class="body payment">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $service->getName() ) ?>
                                                    </td>
                                                    <td class="quantity">1</td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $priceItem->getValue(), $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php endforeach ?>
                                                <?php if( $this->summaryBasket->getPrice()->getCosts() > 0 || $this->summaryBasket->getPrice()->getTaxFlag() === false ) : ?>
                                                <tr class="footer subtotal">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Sub-total' ) ) ?>
                                                    </td>
                                                    <td class="quantity"></td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $this->summaryBasket->getPrice()->getValue(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php if( ( $costs = $this->summaryBasket->getCosts() ) > 0 ) : ?>
                                                <tr class="footer delivery">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', '+ Shipping' ) ) ?>
                                                    </td>
                                                    <td class="quantity"></td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $costs, $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php if( ( $costs = $this->summaryBasket->getCosts( 'payment' ) ) > 0 ) : ?>
                                                <tr class="footer payment">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', '+ Payment costs' ) ) ?>
                                                    </td>
                                                    <td class="quantity"></td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $costs, $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php if( $this->summaryBasket->getPrice()->getTaxFlag() === true ) : ?>
                                                <tr class="footer total">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Total' ) ) ?>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $enc->html( $totalQty ) ?>
                                                    </td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php foreach( $this->summaryBasket->getTaxes() as $taxName => $map ) : ?>
                                                <?php foreach( $map as $taxRate => $priceItem ) : ?>
                                                <?php if( ( $taxValue = $priceItem->getTaxValue() ) > 0 ) : ?>
                                                <tr class="footer tax">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( sprintf( $priceItem->getTaxFlag() ? $this->translate( 'controller/jobs', 'Incl. %1$s%% %2$s' ) : $this->translate( 'controller/jobs', '+ %1$s%% %2$s' ), $this->number( $taxRate ), $this->translate( 'controller/jobs', $taxName ) ) ) ?>
                                                    </td>
                                                    <td class="quantity"></td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $taxValue, $priceItem->getPrecision() ), $this->translate( 'currency', $priceItem->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php endforeach ?>
                                                <?php endforeach ?>
                                                <?php if( $this->summaryBasket->getPrice()->getTaxFlag() === false ) : ?>
                                                <tr class="footer total">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Total' ) ) ?>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $enc->html( $totalQty ) ?>
                                                    </td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts() + $this->summaryBasket->getPrice()->getTaxValue(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                                <?php if( $this->summaryBasket->getPrice()->getRebate() > 0 ) : ?>
                                                <tr class="footer rebate">
                                                    <td class="status"></td>
                                                    <td class="label">
                                                        <?= $enc->html( $this->translate( 'controller/jobs', 'Included rebates' ) ) ?>
                                                    </td>
                                                    <td class="quantity"></td>
                                                    <td class="price">
                                                        <?= $enc->html( sprintf( $pricefmt, $this->number( $this->summaryBasket->getPrice()->getRebate(), $this->summaryBasket->getPrice()->getPrecision() ), $this->translate( 'currency', $this->summaryBasket->getPrice()->getCurrencyId() ) ) ) ?>
                                                    </td>
                                                </tr>
                                                <?php endif ?>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="email-common-outro-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="email-common-outro" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding-top:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <?= $enc->html( nl2br( $this->translate( 'controller/jobs', 'If you have any questions, please reply to this e-mail' ) ) ) ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--[if mso | IE]></td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="email-common-legal-outlook" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]-->
        <div class="email-common-legal" style="Margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="direction:ltr;font-size:0px;padding-bottom:20px 0;text-align:center;vertical-align:top;">
                            <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                            <div class="mj-column-per-100 outlook-group-fix"
                                style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                    style="vertical-align:top;" width="100%">
                                    <tr>
                                        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                            <div
                                                style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:1;text-align:left;color:#000000;">
                                                <?= nl2br( $enc->html( $this->translate( 'controller/jobs', 'All orders are subject to our terms and conditions.' ) ) ) ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div><!--[if mso | IE]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!--[if mso | IE]></td></tr></table><![endif]-->
    </div>
</body>

</html>