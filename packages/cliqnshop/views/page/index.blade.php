@extends('cliqnshop::base')

@section('aimeos_header')
	<?= $aiheader['NewMenu/Design1'] ?? '' ?>
	<?= $aiheader['NewMenu/Design1'] ?? '' ?>
	<?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['cms/page'] ?? '' ?>
@stop

@section('aimeos_nav')
	<?= $aibody['NewMenu/Design1'] ?? '' ?>
@stop

@section('aimeos_head')
	<?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_body')
    <div class="container-fluid">
		<?= $aibody['cms/page'] ?? '' ?>
	</div>
@stop
