<title>How it works</title>

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
<div class="container">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="font-weight-semi-bold text-uppercase mb-3">How it works</h2>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ airoute('aimeos_home') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">How it works</p>
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
    color: var(--ai-my-primarytext2-color);
    background-color: #ffffff;
    }
    .works-heading{
        font-size: 60px;
        font-weight:600;
        color: var(--ai-my-primarytext-color);
    }
    .work-p-img1,.work-p-img2,.work-p-img3,.work-p-img4,.work-p-img5{
        max-width: 70%;
    }
    .section1{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }
    .border-right{
        border-left: dashed;
        border-bottom: dashed;
        padding: 15px;
        border-color: #cfcccf;
        border-width: 2px;
        position: relative;
        border-bottom-left-radius: 15px;
        border-top-left-radius: 15px;
    }
    .border-right::after{
        content: "";
    width: 8px;
    position: absolute;
    height: 8px;
    background: #8b0101;
    left: 1px;
    top: -4px;
    border-radius: 50%;
    }
    .border-right::before{
        content: "";
    width: 13px;
    position: absolute;
    height: 12px;
    background: #fba2a2;
    left: -1px;
    top: -6px;
    border-radius: 50%;
    }
    .border-left::after{
        content: "";
    width: 8px;
    position: absolute;
    height: 8px;
    background: #8b0101;
    right: -5px;
    top: -4px;
    border-radius: 50%;
    }
    .border-left::before{
        content: "";
    width: 13px;
    position: absolute;
    height: 12px;
    background: #fba2a2;
    right: -7px;
    top: -6px;
    border-radius: 50%;
    }
    .border-left{
        border-right-style: dashed;
        border-bottom: dashed;
        padding: 15px;
        border-color: #cfcccf;
        border-width: 2px;
        position: relative;
        border-bottom-right-radius: 15px;
        border-top-right-radius: 15px;
    }
    @media only screen and (max-width: 700px){
        .section1{
        grid-template-columns: 1fr;
    }
    .border-left::after,.border-left::before,
    .border-right::after,.border-right::before{
        content:none;
    }
    div.container p {
    font-size: 13px;
    }
    .works-heading{
        font-size:50px;
    }
        .border-right{
      border:none;
    }
    .border-left{
        border:none;
    }
    h2{
        font-size:20px;
    }
    .grid-algin1{
        grid-row: 1;
    }
    .grid-algin2{
        grid-row: 5;
    }
    .grid-algin3{
        grid-row: 9;
    }
    }

    </style>
    
    <div class="container"> 

         <section class="section1">
                <div class=" border-right">
                    <img class="work-p-img1" src="/img/working-1.png" alt="">
                </div>
                <div class="p-4 grid-algin1">
                    <h1 class="works-heading">1</h1>
                    <p >Sign up and browse through our 100k+ products on <a href="https://cliqnshop.com/">cliqnshop.com</a> and place your order or make a custom request.</p>
                </div>
                <div class="border-left">
                    <h1 class="works-heading">2</h1>
                    <p >As soon as <span class="fw-bolder">cliqnshop</span> receives an order, it is sent to one of our many suppliers and distributors in the USA. A local warehouse receives the product from our suppliers.
    We verify the contents, inspect the package for damage, and manifest your order.</p>
                </div>
                <div class=" p-4">
                    <img class="work-p-img2" src="/img/working-2.png" alt="">
                </div>
                <div class=" border-right">
                    <img class="work-p-img3" src="/img/working-3.png" alt="">
                </div>
                <div class="p-4 grid-algin2">
                    <h1 class="works-heading">3</h1>
                    <p>When your <span class="fw-bolder">cliqnshop</span> package reaches India, there will be no importation or duty formalities to worry about. The final quality check, inspection, and distribution of all items takes place in our <span class="fw-bolder">cliqnshop</span> warehouse in India.</p>
                </div>
                <div class="border-left">
                    <h1 class="works-heading">4</h1>
                    <p >Using one of our logistics partners, your order is dispatched from our India warehouse.</p>
                </div>
                <div class=" p-4">
                    <img class="work-p-img4" src="/img/working-4.png" alt="">
                </div>
                <div class=" border-right">
                    <img class="work-p-img5" src="/img/working-5.png" alt="">
                </div>
                <div class=" p-4 grid-algin3">
                    <h1 class="works-heading">5</h1>
                    <p>The items you ordered from us arrives at your delivery address Safely, Quickly, & Hassle-Free!</p>
                </div>
         </section>

    </div>

@stop
