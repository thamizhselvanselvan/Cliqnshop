<?php
$enc = $this->encoder();

$seenItems=$this->get( 'seenItems');
?>





<?php $this->block()->start( 'home/session/seen' ) ?>
<section class="catalog-session-seen">
	

<?php if(count($seenItems)>=6): ?>

    <div class="block-heading-section">
        <div class="text-center col-12 block-heading">
            <span>Recently viewed Products </span>
        </div>
    </div>
            
        
        <div class="last-seen-slider swiffy-slider   slider-nav-square slider-nav-dark slider-item-show6">
            <div class=" slider-container">
                <?php foreach( $this->get( 'seenItems', [] ) as $seen ) : ?>
                    <div class="seen-item">
                        <?= $seen ?>
                        <!-- <div class="slider-action">
                            <span aria-label="Quick view" class="btn  btn-warning" ><i class="fa fa-eye"></i></span>
                        </div> -->

                    </div>
                <?php endforeach ?>
                
            </div>

            <?php if(count($seenItems)>=7): ?>
                <button type="button" class="slider-nav" aria-label="Go to previous" ></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
            <?php  endif ?>		

        </div>

<?php  endif ?>		
	
</section>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'home/session/seen' ) ?>
