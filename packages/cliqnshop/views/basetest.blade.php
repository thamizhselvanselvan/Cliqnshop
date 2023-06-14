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
        /* topbar search start */

		/* footer start */
		.footer{
				background:#1a2b51;
			}
			.footer li{
				list-style: none;
				color:#fff;
			}
			.footer h5,footer p{
				color:#fff ;
			}
			.footer a{
				color:#fff ;
				font-size: 13px;
			}
			a:hover{
				color:#e21372 ;
			}
			.call-border{
				border-left:3px solid #e21372;
				margin-bottom: 45px;
			}
	/* footer end */
		</style>

	</head>
	<body class="{{ $page ?? '' }}">
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

		<section class="featured section-padding">
            <div class="container-fluid">
                <div class="featured-grid">
                   
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
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
                        </div>
                    
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
                                <p>Within 30 days</p>
                            </div>
                        </div>
                    
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated animated" style="visibility: visible;">
                            <div class="banner-icon">
                                <img src="<?=  asset('/vendor/shop/themes/cliqnshop/assets/img/cs-featured-section/icon-6.svg') ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Safe delivery</h3>
                                <p>Within 30 days</p>
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

		<footer class="footer">
		 <div class="container-fluid text-dark mt-5 pt-2">
			<div class="row px-xl-5 pt-5" >
				<div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
					<!-- <a href="" class="text-decoration-none">
						
						<img src="{{ asset( 'mosh_cliqnshop/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/cliqnshop/assets/logo.png' ) ) }}" class="mb-4 display-5" height="40" title="Logo">
					</a>
					<p>We strive to offer our customers the lowest possible prices, the best available selection, and the utmost convenience</p> -->
					<div>
						<h5 class="pb-3 fw-bold ">Need Help?</h5>
						<ul class="call-border ps-2">
							<li style="color:#e21372">Call Us</li>
							<li class=" pt-1"><a class="fs-6" href="tel:+012 345 67890">+012 345 67890</a></li>
						</ul>
						<ul class="call-border ps-2">
							<li style="color:#e21372">Email for Us</li>
							<li class=" pt-1"><a class="fs-6" href="mailto:contact@cliqnshop.com">contact@cliqnshop.com</a></li>
						</ul>
					</div>
					
					<a target="_blank" href="https://www.facebook.com/profile.php?id=100088088181138" class="ico fa fa-facebook me-1"></a>
                    <a target="_blank" href="https://twitter.com/Cliq_n_Shop" class="ico fa fa-twitter me-1"></a>
					<a target="_blank" href="https://www.instagram.com/cliq_n_shop/" class="ico fa fa-instagram me-1"></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCtPk3zzLElorhBprhfe-oFg" class="ico fa fa-youtube"></a>
                    


					<!-- {{-- <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Bussa Industrial Estate, Mumbai , INDIA - 400025  </p> --}}
					<p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><a href="mailto:contact@cliqnshop.com">contact@cliqnshop.com</a></p>
					<p class="mb-0"><i class="fa fa-phone text-primary mr-3"></i><a href="tel:+012 345 67890">+012 345 67890</a></p> -->
				</div>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold  mb-4">{{ __( 'Policy' ) }}</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="pb-2" href="{{ airoute( 'aimeos_shop_terms' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Terms And Conditions' ) }}</a>
								<a class="pb-2" href="{{ airoute( 'aimeos_shop_privacy' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Privacy Policy' ) }}</a>
								<a class="pb-2" href="{{ airoute( 'aimeos_shop_return_refund' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Return & Refund Policy' ) }}</a>
								<a class="pb-2" href="#"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Imprint' ) }}</a>

								
							</div>
						</div>
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold mb-4">{{ __( 'Shopping' ) }}</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="mb-2" href="{{ airoute( 'aimeos_shop_how-it-works' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'How It Works' ) }}</a>
								<a class="mb-2" href="{{ airoute( 'aimeos_shop_warranty' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Warranty' ) }}</a>
								<a class="mb-2" href="{{ airoute( 'aimeos_shop_disclaimer' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Disclaimer' ) }}</a>
								<a class="mb-2" href="https://b2cship.us/tracking/" target ="_blank"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Track and Shipment' ) }}</a>

								
							</div>
						</div>
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold  mb-4">{{ __( 'About Us' ) }}</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="pb-2" href="{{ airoute( 'aimeos_shop_contactus' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'Contact us' ) }}</a>
								<a class="pb-2" href=""><i class="fa fa-angle-right mr-2"></i>{{ __( 'Company' ) }}</a>
								<a class="pb-2" href="{{ airoute( 'aimeos_shop_faq' ) }}"><i class="fa fa-angle-right mr-2"></i>{{ __( 'FAQ ' ) }}</a>
								
							</div>
						</div>
						<!-- <div class="col-md-3 mb-4">
							<h5 class="font-weight-bold  mb-4">Newsletter</h5>
							<form class="newsletter-footer-form" action="">
								<div class="form-group">
									<input type="text" class="form-control border-0 py-2 rounded-1" placeholder="Your Name" required="required">
								</div>
								<div class="form-group">
									<input type="email" class="form-control border-0 py-2 rounded-1" placeholder="Your Email" required="required">
								</div>
								<div>
									<button class="btn btn-primary btn-block border-0 py-2 rounded-2" type="submit">Subscribe Now</button>
								</div>
							</form>
						</div> -->
					</div>
				</div>
			</div>
			<div class="row border-top border-light mx-xl-5 py-4" >
				<div class="col-md-6 px-xl-0">
					<p class="mb-md-0 text-center text-md-left">
						© <a class=" font-weight-semi-bold" href="#">CLIQNSHOP</a>. All Rights Reserved. Designed
						by
						<a class="font-weight-semi-bold" href="http://moshecom.com/">Mosh E-Com</a>
					</p>
				</div>
				<div class="col-md-6 px-xl-0 text-center text-md-right">
					<img class="img-fluid" style="height:20px;"  src="{{asset('../vendor/shop/themes/cliqnshop/assets/payment-method.png')}}" alt="">
				</div>
			</div>
		</div>
	  </footer>

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
