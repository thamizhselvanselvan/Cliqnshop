@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/filter'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['catalog/session'] ?? '' ?>
    <?= $aiheader['catalog/stage'] ?? '' ?>
    <?= $aiheader['catalog/lists'] ?? '' ?>

    <style>
        @media (min-width: 992px)
        {
            aside .catalog-session-seen .name, aside .catalog-session-pinned .name 
            {
                    margin: 0 0 0.25rem;
                    text-align: start;
                    font-size: 15px !important;
            }
            aside .catalog-session-seen .media-item, aside .catalog-session-pinned .media-item 
            {                    
                    width: 50px;
                    height: 70px;
                    margin-bottom: 0.1rem;                   
            }    
                 
         }

         .aimeos .product .price-item.default .value 
         {
                font-size: 100%;
                font-weight: 600;
                line-height: 1;
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

@section('aimeos_stage')
    <?= $aibody['catalog/stage'] ?? '' ?>
@stop

@section('aimeos_body')
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-3  filter-sidebar">
                <?= $aibody['catalog/filter'] ?? '' ?>
                <?= $aibody['catalog/session'] ?? '' ?>
            </aside>
            <div class="col-lg-9">
                <?= $aibody['catalog/lists'] ?>
            </div>
        </div>
    </div>
@stop
