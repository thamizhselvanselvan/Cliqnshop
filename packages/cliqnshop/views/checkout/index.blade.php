<title>{{ __( 'Checkout') }}</title>
@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['catalog/tree'] ?? '' ?>
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['checkout/standard'] ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_nav')
    <?= $aibody['NewMenu/Design1'] ?? '' ?> 
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    <div class="container">
        <?= $aibody['checkout/standard'] ?>
    </div>
@stop
