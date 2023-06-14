<?php
$enc = $this->encoder();

?>

<style>
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

<footer class="footer">
		 <div class="container-fluid text-dark pt-2">
			<div class="row px-xl-5 pt-5" >
				<div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
					<!-- <a href="" class="text-decoration-none">
						
						<img src="{{ asset( 'mosh_cliqnshop/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/cliqnshop/assets/logo.png' ) ) }}" class="mb-4 display-5" height="40" title="Logo">
					</a>
					<p>We strive to offer our customers the lowest possible prices, the best available selection, and the utmost convenience</p> -->
					<?php $call_us=$this->get('call_us','+012 345 67890');
					      $email_us=$this->get('email_us','contact@cliqnshop.com');
						  $facebook=$this->get('facebook','https://www.facebook.com/profile.php?id=100088088181138');
						  $twitter=$this->get('twitter','https://twitter.com/Cliq_n_Shop');
						  $instagram=$this->get('instagram','https://www.instagram.com/cliq_n_shop/');
						  $youtube=$this->get('youtube','https://www.youtube.com/channel/UCtPk3zzLElorhBprhfe-oFg');
					 ?>
					<div>
						<h5 class="pb-3 fw-bold ">Need Help?</h5>
						<ul class="call-border ps-2">
							<li style="color:#e21372">Call Us</li>
							<li class=" pt-1"><a class="fs-6" href="tel:<?php echo $call_us?>"><?php echo $call_us?></a></li>
						</ul>
						<ul class="call-border ps-2">
							<li style="color:#e21372">Email for Us</li>
							<li class=" pt-1"><a class="fs-6" href="mailto:<?php echo $email_us?>"><?php echo $email_us?></a></li>
						</ul>
					</div>
					
					<a target="_blank" href="<?php echo $facebook?>" class="ico fa fa-facebook me-1"></a>
                    <a target="_blank" href="<?php echo $twitter?>" class="ico fa fa-twitter me-1"></a>
					<a target="_blank" href="<?php echo $instagram?>" class="ico fa fa-instagram me-1"></a>
                    <a target="_blank" href="<?php echo $youtube?>" class="ico fa fa-youtube"></a>
                    


					<!-- {{-- <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Bussa Industrial Estate, Mumbai , INDIA - 400025  </p> --}}
					<p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><a href="mailto:contact@cliqnshop.com">contact@cliqnshop.com</a></p>
					<p class="mb-0"><i class="fa fa-phone text-primary mr-3"></i><a href="tel:+012 345 67890">+012 345 67890</a></p> -->
				</div>
                <?php $site=$this->get('sitecode'); ?>
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold  mb-4">Policy</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="pb-2" href="<?php echo url($site.'/terms_page')?>"><i class="fa fa-angle-right mr-2"></i>Terms And Conditions</a>
								<a class="pb-2" href="<?php echo url($site.'/privacy_page')?>"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
								<a class="pb-2" href="<?php echo url($site.'/return-policy')?>"><i class="fa fa-angle-right mr-2"></i>Return & Refund Policy</a>
								<a class="pb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Imprint</a>

								
							</div>
						</div>
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold mb-4">Shopping</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="mb-2" href="<?php echo url($site.'/how-it-works')?>"><i class="fa fa-angle-right mr-2"></i>How It Works</a>
								<a class="mb-2" href="<?php echo url($site.'/warranty')?>"><i class="fa fa-angle-right mr-2"></i>Warranty</a>
								<a class="mb-2" href="<?php echo url($site.'/disclaimer')?>"><i class="fa fa-angle-right mr-2"></i>Disclaimer</a>
								<a class="mb-2" href="https://b2cship.us/tracking/" target ="_blank"><i class="fa fa-angle-right mr-2"></i>Track and Shipment</a>

								
							</div>
						</div>
						<div class="col-md-4 mb-4">
							<h5 class="font-weight-bold  mb-4">About Us</h5>
							<div class="d-flex flex-column justify-content-start">
								<a class="pb-2" href="<?php echo url($site.'/contact_page')?>"><i class="fa fa-angle-right mr-2"></i>Contact us</a>
								<a class="pb-2" href=""><i class="fa fa-angle-right mr-2"></i>Company</a>
								<a class="pb-2" href="<?php echo url($site.'/faq_page')?>"><i class="fa fa-angle-right mr-2"></i>FAQ</a>
								
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
					<img class="img-fluid" style="height:20px;"  src="<?php echo asset('../vendor/shop/themes/cliqnshop/assets/payment-method.png')?>" alt="">
				</div>
			</div>
		</div>
	  </footer>