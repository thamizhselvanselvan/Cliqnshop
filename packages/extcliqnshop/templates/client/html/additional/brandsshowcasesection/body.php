<?php

$enc = $this->encoder();

$trending_brands=$this->get( 'trending_brands');




?>



<?php if(!empty($trending_brands) && sizeof($trending_brands) == 6  ): ?>
<?php if (!empty($trending_brands['banner1']->image) || !empty($trending_brands['banner2']->image) || !empty($trending_brands['banner3']->image) ): ?>

    <div class="block-heading-section pt-4 pb-2">
        <div class="text-center col-12 block-heading">
            <span>Explore our Trending Brands</span>
        </div>
    </div>

    <div class="row g-0" data-gjs-droppable=".col" data-gjs-name="Row" data-gutters="g-0">
        <div class="col-sm">
            <div class="row g-0" data-gjs-droppable=".col" data-gjs-name="Row" data-gutters="g-0">
                
                <div class="col">
                    <a class="brand-link" href="<?= $trending_brands['banner1']->url ?>" >                    
                        <img loading="lazy" 
                            class="brand-img"
                            src="<?= !empty($trending_brands['banner1']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner1']->image, '+2 minutes') : ''   ?>"
                            srcset="<?= !empty($trending_brands['banner1']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner1']->image, '+2 minutes') : ''   ?> 240w"
                            alt="logo-1.png" id="immyok">
                    </a>
                </div>
                <div class="col">
                    <a class="brand-link" href="<?= $trending_brands['banner2']->url ?>" >                    
                        <img loading="lazy"
                            class="brand-img"
                            src="<?= !empty($trending_brands['banner2']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner2']->image, '+2 minutes') : ''   ?>"
                            srcset="<?= !empty($trending_brands['banner2']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner2']->image, '+2 minutes') : ''   ?> 240w"
                            alt="logo-1.png" >
                    </a>
                </div>
                <div class="col">
                    <a class="brand-link" href="<?= $trending_brands['banner3']->url ?>" >                    
                        <img loading="lazy" 
                            class="brand-img"
                            src="<?= !empty($trending_brands['banner3']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner3']->image, '+2 minutes') : ''   ?>"
                            srcset="<?= !empty($trending_brands['banner3']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner3']->image, '+2 minutes') : ''   ?> 240w"
                            alt="logo-3.png" id="immyok">
                    </a>
                </div>
                
            </div>
        </div>
        <div class="col-sm">
            <div class="row g-0" data-gjs-droppable=".col" data-gjs-name="Row" data-gutters="g-0">
                <div class="col">
                        <a class="brand-link" href="<?= $trending_brands['banner4']->url ?>" >                    
                            <img loading="lazy" 
                                class="brand-img"
                                src="<?= !empty($trending_brands['banner4']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner4']->image, '+2 minutes') : ''   ?>"
                                srcset="<?= !empty($trending_brands['banner4']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner4']->image, '+2 minutes') : ''   ?> 240w"
                                alt="logo-4.png" id="immyok">
                        </a>
                    </div>
                    <div class="col">
                        <a class="brand-link" href="<?= $trending_brands['banner5']->url ?>" >                    
                            <img loading="lazy" 
                                class="brand-img"
                                src="<?= !empty($trending_brands['banner5']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner5']->image, '+2 minutes') : ''   ?>"
                                srcset="<?= !empty($trending_brands['banner5']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner5']->image, '+2 minutes') : ''   ?> 240w"
                                alt="logo-5.png" id="immyok">
                        </a>
                    </div>
                    <div class="col">
                        <a class="brand-link" href="<?= $trending_brands['banner6']->url ?>" >                    
                            <img loading="lazy" 
                                class="brand-img"
                                src="<?= !empty($trending_brands['banner6']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner6']->image, '+2 minutes') : ''   ?>"
                                srcset="<?= !empty($trending_brands['banner6']->image)? Storage::disk('do')->temporaryUrl($trending_brands['banner6']->image, '+2 minutes') : ''   ?> 240w"
                                alt="logo-6.png" id="immyok">
                        </a>
                    </div>
                
            </div>
        </div>
    </div>
</div>



<?php  endif ?>
<?php  endif ?>
        
        

  


   
    


