<title>{{ __( 'Thank you') }}</title>

@extends('cliqnshop::base')

@section('aimeos_header')
    <?= $aiheader['NewMenu/Design1'] ?? '' ?>
    <?= $aiheader['checkout/confirm'] ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/home'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>

@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_head_nav')
    <?= $aibody['NewMenu/Design1'] ?? '' ?>
@stop

@section('aimeos_nav')
    <?= $aibody['NewMenu/Design1'] ?? '' ?>
    <?= $aibody['catalog/search'] ?? '' ?>
@stop

@section('aimeos_body')
    <div class="container-fluid">
        <?= $aibody['checkout/confirm'] ?>
    </div>
@stop
