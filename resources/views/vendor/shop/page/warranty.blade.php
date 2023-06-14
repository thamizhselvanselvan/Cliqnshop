<title>Warranty</title>

@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
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
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Warranty</h2>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Warranty</p>
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
        h2{
            font-size:20px;
        }
    }
    </style>
    
    

    <?php if(isset($content) && $content ): ?>
        <div class="container">
            <?= $content ?>
        </div>
    <?php else : ?>
        {{-- <div class="container">
            <p>For the majority of USA products bought on <a href="https://cliqnshop.com/">cliqnshop.com</a>, we offer a <span class="fw-bolder">1-year</span> manufacturer warranty. As a courtesy and assurance to our clients, <span class="fw-bolder">cliqnshop</span> will offer a 3-month warranty against manufacturer defect for specific electronics products and appliances in the absence of a manufacturer's warranty.</p>      
            <p class="pb-3">All transportation arrangements to and from the manufacturer for repair and replacement will be handled by <span class="fw-bolder">cliqnshop</span>. We will obtain a warranty from the manufacturer in the US and deliver the repaired or replaced item at no cost to you!</p>
            <h5 class="fw-bold">How do you approach it?</h5>
            <p class="ps-4">When you receive your purchase, you should register it on <a href="https://cliqnshop.com/">cliqnshop.com</a> by providing your name, address, phone number, product serial number, and barcode. This will enable you to take advantage of the warranty. Your product must be returned with all of its original packaging.</p>
            <p class="ps-4">Our experts will inspect the item to establish whether the defect is the result of a manufacturer defect or misuse. The product will be sent to the manufacturer or the closest service center for repair or replacement once it has been determined that there is a manufacturing problem.</p>
        </div> --}}
    <?php endif ?>
@stop
