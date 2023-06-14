<?php
$enc = $this->encoder();
$promo_banner=$this->get( 'promo_banner');


?>





    

<?php if(!empty($promo_banner)  ): ?>
     
    <div class="wrapper-content hero-banner promo-banner">  
            <div class="content-body withinCenter withinCenter copyStyleWhite copyStyleMobileWhite">
                <div class="content-text" style="background:var(--ai-my-primarygray-color)">
                    <div class="row content-row">
                        <div class="col">
                            <div class="banner-heading womensSmallBold">
                                <?=  !empty($promo_banner['primary_text'])?$promo_banner['primary_text']:'';   ?>
                            </div>
                            <div class="banner-sub-heading">
                                <?=  !empty($promo_banner['secondary_text'])?$promo_banner['secondary_text']:'';   ?>
                            </div>
                        </div>
                        <div class="col details-holder">
                            <div class="post-button-details">
                                <div class="banner-asset proxi-common">
                                    <div class="banner-wrapper">
                                        <div class="content">
                                        <?=  !empty($promo_banner['offer_text'])?$promo_banner['offer_text']:'';   ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col cta-links-wrap">
                            <div class="cta-links">
                                <div class="cta-link d-none d-lg-block link-text-only">
                                    <a class="link-cta btn-hero " href="<?=  !empty($promo_banner['url'])?$promo_banner['url']:'';   ?>">SHOP NOW
                                    </a>
                                </div>
                                <div class="cta-link d-lg-none link-text-only">
                                    <a class="link-cta btn-hero" href="<?=  !empty($promo_banner['url'])?$promo_banner['url']:'';   ?>">SHOP NOW
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php  endif ?>
