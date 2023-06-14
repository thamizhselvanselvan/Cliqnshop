<?php
$enc = $this->encoder();
$threeBanners=$this->get( 'threeBanners');

?>



<?php if(!empty($threeBanners) && sizeof($threeBanners) == 3  ): ?>
    
    <?php if (!empty($threeBanners['banner1']->image) || !empty($threeBanners['banner2']->image) || !empty($threeBanners['banner3']->image)): ?>

        <div class="Three-banner-section row g-0 pt-4" data-gjs-droppable=".col" data-gjs-name="Row" data-gutters="g-0" data-break="col-sm">
            <div class="col-sm">
                <a href="<?= $threeBanners['banner1']->url ?>" class="link-block space">
                    <img loading="lazy" alt="banner-1.png" src="<?= !empty($threeBanners['banner1']->image)? Storage::disk('do')->temporaryUrl($threeBanners['banner1']->image, '+2 minutes') : ''   ?>" alt="" id="im0j">
                </a>
            </div>
            <div class="col-sm">
                <a href="<?= $threeBanners['banner2']->url ?>" class="link-block space">
                    <img loading="lazy" alt="banner-2.png" src="<?= !empty($threeBanners['banner2']->image)? Storage::disk('do')->temporaryUrl($threeBanners['banner2']->image, '+2 minutes') : ''   ?>" id="im0j">
                </a>
            </div>
            <div class="col-sm">
                <a href="<?= $threeBanners['banner3']->url ?>" class="link-block space">
                    <img loading="lazy" alt="banner-3.png" src="<?= !empty($threeBanners['banner3']->image)? Storage::disk('do')->temporaryUrl($threeBanners['banner3']->image, '+2 minutes') : ''   ?>" id="im0j">
                </a>
            </div>
        </div>

    <?php  endif ?>
    
<?php  endif ?>
