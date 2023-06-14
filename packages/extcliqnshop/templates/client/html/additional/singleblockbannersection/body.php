<?php
$enc = $this->encoder();
$singlebanner=$this->get( 'singlebanner');


?>



<?php if(!empty($singlebanner) && sizeof($singlebanner) == 1  ): ?>

        
    
    <?php if (!empty($singlebanner['banner1']->image) ): ?>

        <div class="single-block-section pt-4">
            <div class="background" data-background="<?= !empty($singlebanner['banner1']->image)? Storage::disk('do')->temporaryUrl($singlebanner['banner1']->image, '+2 minutes') : ''   ?> 3000w" id="ixg1na"
                style=" background-repeat: no-repeat;  background-size:cover; background-position: 50% 50%; background-image: url(&quot;<?= !empty($singlebanner['banner1']->image)? Storage::disk('do')->temporaryUrl($singlebanner['banner1']->image, '+2 minutes') : ''   ?>&quot;);">
                <div class="container-xl" >
                    <div>
                        <p><span id="iv8fnq"><?= $singlebanner['banner1']->primary_text ?></span><br draggable="true" data-highlightable="1"
                                id="i1otkm"><span id="il628n"></span></p>
                        <h6><?= $singlebanner['banner1']->secondary_text ?></h6>
                    </div><a href="<?= $singlebanner['banner1']->url ?>" title="<?= $singlebanner['banner1']->primary_text ?>" class="btn-hero">Shop Now</a>
                </div>
            </div>
        </div>

      
    

    <?php  endif ?>
    
<?php  endif ?>
