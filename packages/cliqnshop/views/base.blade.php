<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr' }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{-- <meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-{{ app( 'aimeos.context' )->get()->nonce() }}' https://cdnjs.cloudflare.com https://fonts.gstatic.com http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css; style-src 'unsafe-inline' 'self' https://cdnjs.cloudflare.com https://fonts.googleapis.com http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css; img-src 'self' data: https://aimeos.org https://m.media-amazon.com; frame-src https://www.youtube.com https://player.vimeo.com"> --}}
		<meta name="csrf-token" content="{{ csrf_token() }}">

		@if( in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) )
			<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/cliqnshop/app.rtl.css?v=' . config( 'shop.version', 1 ) ) }}">
		@else
			<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/cliqnshop/app.css?v=' . config( 'shop.version', 1 ) ) }}">
		@endif
		<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/cliqnshop/aimeos.css?v=' . config( 'shop.version', 1 ) ) }}" />

		@yield('aimeos_header')
		<?= $aiheader['additional/TopBar'] ?? '' ?>

		<link rel="icon" href="{{ asset( 'mosh_cliqnshop/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/cliqnshop/assets/icon.png' ) ) }}"/>

		<link rel="preload" href="/vendor/shop/themes/cliqnshop/assets/roboto-condensed-v19-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/cliqnshop/assets/roboto-condensed-v19-latin-700.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/cliqnshop/assets/bootstrap-icons.woff2" as="font" type="font/woff2" crossorigin>


		{{-- fornt awesome cdn link --}}		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<style>	
			/* topbar search start */
			.openBtn {
			font-size: 20px;
			cursor: pointer;
			color: #000000;
			}
			.openBtn:hover {
			color: #000000;
			}

			.overlay {
			width: 100%;
			display: none;
			position: fixed;
			box-shadow: 0 2px 20px 0 rgb(0 0 0 / 20%);
			z-index: 50;
			top: 0;
			left: 0;
			background-color: #ffffff;
			}

			.overlay .closebtn {
			position: absolute;
			top: -10px;
			right: 10px;
			font-size: 40px;
			cursor: pointer;
			color: #6b6b6b;
			}

			.overlay .closebtn:hover {
			color: #ccc;
			}
			.overlay .catalog-filter nav form{
				margin:0;
			}
			.autocomplete {
				z-index: 1300;
			}
			/* topbar search start */

			
			.block-heading span{
				font-family: sans-serif !important;
				font-size:0.8rem !important;
				font-weight: 600;
				text-transform: uppercase;
			}
			.block-heading, .slider-heading{
				margin: 0 !important;
			}
			.block-heading-section{
				padding-top: 24px !important;
    			padding-bottom: 8px !important;
			}
			.block-heading:after{
				position: absolute;
				content: "";
				width: 100%;
				border-bottom: solid 1px var(--ai-my-border-color);
				left: 50%;
				transform: translateX(-50%);
				animation: border_anim 8s linear backwards;
			}
			@keyframes border_anim {
				0%{
					width: 200px;
				}
				100%{
					width: 100%;
				}
			}
		</style>

	</head>
	<body class="{{ $page ?? '' }}">
		
		<?= $aibody['additional/TopBar'] ?? '' ?>

		<nav class="navbar navbar-expand-md navbar-top" style="min-height:60px;" >
			<a class="navbar-brand" href="{{ airoute('aimeos_home') }}" title="Logo">
				<img src="{{ asset( 'mosh_cliqnshop/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/cliqnshop/assets/logo.png' ) ) }}" height="40" title="Logo">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-top" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-top">
			    
				@yield('aimeos_head_nav')
			</div>

			@yield('aimeos_head_locale')
			

			<a class="openBtn p-2" onclick="openSearch()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
			<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
			</svg></a>

			<div id="myOverlay" class="overlay">
			    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
				@yield('aimeos_head_search')
			</div>

			<ul class="navbar-nav">
				@if (Auth::guest() && config('app.shop_registration'))
					<li class="nav-item register"><a class="nav-link" href="{{ airoute( 'register' ) }}" title="{{ __( 'Register' ) }}"><span class="name">{{ __('Register') }}</span></a></li>
				@endif
				@if (Auth::guest())
					<li class="nav-item login"><a class="nav-link" href="{{ airoute( 'login' ) }}" title="{{ __( 'Login' ) }}"><span class="name">{{ __( 'Login' ) }}</span></a></li>
				@else
					<li class="nav-item login profile dropdown">
						<a href="#" class="nav-link dropdown-toggle "  data-bs-toggle="dropdown"  role="button" aria-expanded="false" title="{{ __( 'Account' ) }}"><span class="name">{{ __( 'Account' ) }}</span> <span class="caret"></span></a>
						<ul class="dropdown-menu " aria-labelledby="navbarDropdown" role="menu" style="left: -60px;">
							<li class="dropdown-item"><a class="nav-link" href="{{ airoute( 'aimeos_shop_account' ) }}"><span class="name">{{ __( 'Profile' ) }}</span></a></li>
							<li class="dropdown-item"><form id="logout" action="{{ airoute( 'logout' ) }}" method="POST">{{ csrf_field() }}<button class="nav-link"><span class="name">{{ __( 'Logout' ) }}</span></button></form></li>
						</ul>
					</li>
				@endif
			</ul>

			@yield('aimeos_head_basket')
		</nav>

		<div class="content">
			@yield('aimeos_stage')
			@yield('aimeos_body')
			@yield('content')
		</div>

		
		{{-- CS featured section   start --}}

		<section class="featured py-4">
            <div class="container-fluid">
                <div class="featured-grid">
                   
                        <!-- <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-1.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Best prices &amp; offers</h3>
                                <p>Orders $50 or more</p>
                            </div>
                        </div>
                   
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-2.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Free delivery</h3>
                                <p>24/7 amazing services</p>
                            </div>
                        </div>
                   
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-3.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Great daily deal</h3>
                                <p>When you sign up</p>
                            </div>
                        </div> -->
                    
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-4.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Wide assortment</h3>
                                <p>Mega Discounts</p>
                            </div>
                        </div>
                  
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-5.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Easy returns</h3>
                                <p>Within 15 days</p>
                            </div>
                        </div>
                    
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-6.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Safe delivery</h3>
                                <p>Within 7 to 10 days</p>
                            </div>
                        </div>
                   
                </div>
            </div>
        </section>
		{{-- CS featured section   end --}}



		{{-- <footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-sm-6 footer-left">
								<div class="footer-block">
									<h2 class="pb-3">{{ __( 'LEGAL' ) }}</h2>
									<p><a href="#">{{ __( 'Terms & Conditions' ) }}</a></p>
									<p><a href="#">{{ __( 'Privacy Notice' ) }}</a></p>
									<p><a href="#">{{ __( 'Imprint' ) }}</a></p>
								</div>
							</div>
							<div class="col-sm-6 footer-center">
								<div class="footer-block">
									<h2 class="pb-3">{{ __( 'ABOUT US' ) }}</h2>
									<p><a href="#">{{ __( 'Contact us' ) }}</a></p>
									<p><a href="#">{{ __( 'Company' ) }}</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 footer-right">
						<div class="footer-block">
							<a class="logo" href="/" title="Logo">
							    <img src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/cliqnshop/assets/logo.png' ) ) }}" height="40" title="Logo">
							</a>
							<div class="social">
								<p><a href="#" class="sm facebook" title="Facebook" rel="noopener">Facebook</a></p>
								<p><a href="#" class="sm twitter" title="Twitter" rel="noopener">Twitter</a></p>
								<p><a href="#" class="sm instagram" title="Instagram" rel="noopener">Instagram</a></p>
								<p><a href="#" class="sm youtube" title="Youtube" rel="noopener">Youtube</a></p>
							</div>
						</div>
					</div>
				</div>

				
			</div>

			

		</footer> --}}

		<?= $aibody['additional/footer'] ?? '' ?>

		<a id="toTop"  class="back-to-top rounded-1" href="#" title="{{ __( 'Back to top' ) }}">
			<div class="top-icon"></div>
		</a>	
		<script src="{{ asset('vendor/shop/themes/cliqnshop/app.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		<script src="{{ asset('vendor/shop/themes/cliqnshop/aimeos.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		@yield('aimeos_scripts')


		<script>
			// search popup start
			function openSearch() {
			document.getElementById("myOverlay").style.display = "block";
			}

			function closeSearch() {
			document.getElementById("myOverlay").style.display = "none";
			}
			// search popup end
		</script>
	</body>
</html>
