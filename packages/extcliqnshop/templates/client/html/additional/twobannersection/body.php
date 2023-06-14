<?php
$enc = $this->encoder();
$twoBanners=$this->get( 'twoBanners');

?>




<?php if(!empty($twoBanners) && sizeof($twoBanners) == 2  ): ?>
    <?php if (!empty($twoBanners['banner1']->image) || !empty($twoBanners['banner2']->image)  ): ?>

        <div class="Two-banner-section pt-4" class="row g-0" data-gjs-droppable=".col" data-gjs-name="Row" data-gutters="g-0" data-break="col-md">
            
            <div class="col">
                <a title="" href="<?= $twoBanners['banner1']->url ?>" id="is5n8h" class="space">
                    <img loading="lazy" 
                    
                    src="<?= !empty($twoBanners['banner1']->image)? Storage::disk('do')->temporaryUrl($twoBanners['banner1']->image, '+2 minutes') : ''   ?>"                    
                    srcset="<?= !empty($twoBanners['banner1']->image)? Storage::disk('do')->temporaryUrl($twoBanners['banner1']->image, '+2 minutes') : ''   ?> 480w"                        
                    alt=""                     
                    id="ig0kh"
                    >
                </a>
            </div>
            <div class="col">
                <a title="" href="<?= $twoBanners['banner2']->url ?>" id="is5n8h" class="space">
                <img loading="lazy"                     
                    src="<?= !empty($twoBanners['banner2']->image)? Storage::disk('do')->temporaryUrl($twoBanners['banner2']->image, '+2 minutes') : ''   ?>"                    
                    srcset="<?= !empty($twoBanners['banner2']->image)? Storage::disk('do')->temporaryUrl($twoBanners['banner2']->image, '+2 minutes') : ''   ?> 480w"                        
                    alt=""                     
                    id="ig0kh"
                    >
                </a>
            </div>

        </div>

        

    <?php  endif ?>
<?php  endif ?>