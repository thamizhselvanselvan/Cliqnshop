<?php
$enc = $this->encoder();
$couponsAvailable =  $this->get('couponsAvailable');
?>


<div class="coupon-section">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
                        <?php foreach ($couponsAvailable as $key=>$coupon) :?>
                            
                        <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                             <?= $coupon->label?> Apply couponcode : <span class="fw-bold"><?= $coupon->code?></span>
					    </div>
                    <?php endforeach ?>
					
					
				</div>
				<button class="carousel-control-prev prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				</button>
				<button class="carousel-control-next next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
				</button>
			</div>
		</div>



