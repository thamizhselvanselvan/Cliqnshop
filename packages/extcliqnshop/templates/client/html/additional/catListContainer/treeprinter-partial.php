<?php

    $enc = $this->encoder();
    $target = $this->config( 'client/html/catalog/tree/url/target' );
    $controller = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );
    $action = $this->config( 'client/html/catalog/tree/url/action', 'list' );
    $config = $this->config( 'client/html/catalog/tree/url/config', [] );

?>




<?php foreach( $this->get( 'nodes', [] ) as $item ) : ?>
		<?php if( $item->getStatus() > 0 ) : ?>
        <?php  $catalog_config= $item->getConfig(); 
           
        ?>
            <?php if( array_key_exists('is-premium',$catalog_config) && $catalog_config['is-premium']== "true" ): ?>
			
                <?php $params = array_merge( $this->get( 'params', [] ), ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ) ?>
                <li>
                    <a href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $controller, $action, $params, [], $config ) ) ?>" title="<?= $enc->html( $item->getName(), $enc::TRUST ) ?>"> 
                        <span class="icon-sec">
                        
                            <?php if(  count ($item->getRefItems( 'media', 'icon', 'default' )) >=1) : ?>

                                <?php foreach( $item->getRefItems( 'media', 'icon', 'default' ) as $mediaItem ) : ?>
                                    <img  loading="lazy"
                                        src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"	
                                        alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ) ?>"
                                    >
                                <?php endforeach ?>
                            <?php  else: ?>
                                    <img src="../vendor/shop/themes/cliqnshop/assets/default-cat-icon.svg" alt="no-img">
                            <?php endif ?>


                        </span>
                        <?= $enc->html( $item->getName(), $enc::TRUST ) ?>  
                    </a>
                </li>

            <?php endif ?>
            

            <?php if( count( $item->getChildren() ) > 0 ) : ?>               
                    
                    <?= $this->partial(
                        $this->config( 'client/html/additional/catlistcontainer/treeprinter/partial', 'additional/catlistcontainer/treeprinter-partial' ), [
                            'nodes' => $item->getChildren(),
							'path' => $this->get( 'path', map() ),
							'level' => $this->get( 'level', 0 ) + 1,
							'params' => $this->get( 'params', [] )
                             ] ) ?>
            <?php endif ?>



        
        <?php endif ?>
<?php endforeach ?>