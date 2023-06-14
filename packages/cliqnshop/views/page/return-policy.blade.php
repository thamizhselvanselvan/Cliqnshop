@extends('cliqnshop::base')
<title>Returns and Refund Policy</title>
@section('aimeos_header')
<?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    

    <?= $aiheader['catalog/home'] ?? '' ?>
    

@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
    <?= $aibody['NewMenu/Design1'] ?? '' ?>
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    


    <div class="container pb-4">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 120px">
            <h2 class="font-weight-semi-bold text-uppercase mb-3">Returns and Refund Policy</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Returns and Refund Policy
                </p>
            </div>
        </div>
    </div>

  

<style>
div.container {
background-color: #ffffff;
}
div.container p {
font-family: Arial;
font-size: 15px;
font-style: normal;
font-weight: normal;
text-decoration: none;
text-transform: none;
color: #606060;
background-color: #ffffff;
}
@media only screen and (max-width: 700px){
        div.container p {
            font-size: 13px;
        }
        div.container h5{
            font-size: 16px;
        }
        h2{
            font-size: 20px;
        }
    }
</style>

<?php if(isset($content) && $content ): ?>
    <div class="container">
        <?= $content ?>
    </div>
<?php else : ?>
    <div class="container">
        <p>Every item we sell at <span class="fw-bolder">cliqnshop</span> is brand-new and in its original packaging. We will try our best to resolve all issues as soon as possible, however, faults or problems could happen as a result of manufacturing or logistics setbacks.</p>
        <p>If for any reason you are dissatisfied with your purchase or it does not meet your expectations, <span class="fw-bolder">cliqnshop</span> will give you a full refund or store credit for the item, provided that it is returned to us in its original packing and includes all accompanying accessories and manuals.</p>
        <p>All items purchased from <a href="https://cliqnshop.com/">cliqnshop.com</a>, with the exception of those marked "not returnable," may be returned within the specified time frame.</p>
        <p class="pb-3">For further details about our return policy, please check the section below.</p>

        <h5 class="fw-bold">Returns</h5>
        <p class="ps-4">Within 24 hours after delivery, the purchased item (or products) must be returned. All products being returned must be brand-new, unopened, and still have their original tags and labels on them. Products that are found to be damaged in the packing are also taken into consideration for returns, though the terms may change depending on the product category. </p>
        <p class="pb-3 ps-4">Contact customer service at support@cliqnshop.com.</p>

        <h5 class="fw-bold">Refund</h5>
        <p class="ps-4">After receiving your return and inspecting the condition of your item, we will process your return. Please allow at least 7 – 14 working days from the receipt of your item to process your return. We will notify you by email when your return has been processed.</p>
        <p class="pb-3 ps-4">For returned item/items, full refund is issued to the original payment method i.e. bank account, UPI ID, net banking, etc.</p>

        <h5 class="fw-bold">Cancellation</h5>
        <p class="ps-4">To cancel a purchase, send an email to support@cliqnshop.com or chat with our customer service team on WhatsApp: xxxxxxxxxx</p>
        <p class="ps-4"><b>Note:</b> You can simply decline to accept an item if you still receive one after cancelling. You will receive a refund to the original payment method for any amount spent on it.</p>
        <p class="ps-4">If payment was made in advance, your order will be immediately cancelled and a refund will be sent to your original payment method.</p>
        <p class="ps-4">*Please contact us at support@cliqnshop.com if you have any queries about our return policy.*</p>

    </div>

<?php endif ?>
    
@stop
