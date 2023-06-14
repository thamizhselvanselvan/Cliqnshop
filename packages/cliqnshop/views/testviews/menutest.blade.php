@extends('cliqnshop::basetest')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['additional/ProductSlider'] ?? '' ?>
    <?= $aiheader['additional/catListContainer'] ?? '' ?>
    <?= $aiheader['additional/BrandsShowcaseSection'] ?? '' ?>
    <?= $aiheader['additional/ThreeBannerSection'] ?? '' ?>
    <?= $aiheader['additional/TwoBannerSection'] ?? '' ?>
    <?= $aiheader['additional/SingleBlockBannerSection'] ?? '' ?>
    <?= $aiheader['additional/RecentlyViewedProductSection'] ?? '' ?>
    <?= $aiheader['additional/PromoBannerSection'] ?? '' ?>
    

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    <style>
        .block-heading-section {
            padding: 0px 80px;
            padding-top: 75px;
        }

        .block-heading:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 1px;
            background: #ddd;
            left: 0;
            top: 53%;
        }

        .block-heading {
            line-height: 32px;
            margin: 24px 0 27px;

        }

        .block-heading,
        .slider-heading {
            font-family: Moneta-Regular, Times New Roman, times, serif;
            font-size: 28px;
            letter-spacing: 1.2px;
            line-height: 38px;
            text-transform: none;
            margin: 0 0 45px;
            position: relative;
        }

        .block-heading span {
            padding: 1.5px 15px;
            display: inline-block;
            position: relative;
            background-color: #fff;
            z-index: 5;
        }    
       
        @media only screen and (max-width:650px){
            .block-heading, .slider-heading {
                font-size: 12px;
                font-weight: 600;
                line-height: 20px;
            }
        }

    </style>




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

    <div class="">

        {{-- slider section start --}}
        <?= $aibody['catalog/home'] ?? '' ?>
        {{-- slider section end --}}




        {{-- promo banner section start --}}
        <?= $aibody['additional/PromoBannerSection'] ?? '' ?>       
        {{-- promo banner section end --}}






        {{-- Explore Premium & Luxury Products From The Overeas Market In India start  --}}
        <?= $aibody['additional/catListContainer'] ?? '' ?>
        {{-- Explore Premium & Luxury Products From The Overeas Market In India  end  --}}






        {{-- Three Banner Section start --}}
        <?= $aibody['additional/ThreeBannerSection'] ?? '' ?>
        {{-- Three Banner Section end --}}




        {{-- top selling products section start --}}
        <?= $aibody['additional/ProductSlider'] ?? '' ?>
        {{-- top selling products section end --}}






        <!-- two banner section start -->        
        <?= $aibody['additional/TwoBannerSection'] ?? '' ?>
        <!-- two banner section end -->






        {{-- Latest products section start --}}
        <div class="block-heading-section pt-4 pb-2">
            <div class="text-center col-12 block-heading">
                <span>New Products </span>
            </div>
        </div>

        <?= $aibody['additional/NewProductSlider'] ?? '' ?>
        {{-- Latest products section end --}}








        {{-- brands-showcase section start --}}
        <?= $aibody['additional/BrandsShowcaseSection'] ?? '' ?>
        {{-- brands-showcase section start --}}






        {{-- single block banner section start --}}
        {{-- title_text, main_text , sub_text , url_link , image_link  --}}
        <?= $aibody['additional/SingleBlockBannerSection'] ?? '' ?>
        {{-- single block banner section  end --}}


        {{-- Recently viewed Product section start --}}     
        <?= $aibody['additional/RecentlyViewedProductSection'] ?? '' ?>
        {{-- Recently viewed Product section  end --}}



    </div>

@stop
