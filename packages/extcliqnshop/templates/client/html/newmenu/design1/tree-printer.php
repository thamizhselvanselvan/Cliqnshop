<?php

    $enc = $this->encoder();

    $target = $this->config( 'client/html/catalog/tree/url/target' );
    $controller = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );
    $action = $this->config( 'client/html/catalog/tree/url/action', 'list' );
    $config = $this->config( 'client/html/catalog/tree/url/config', [] );
?>



<?php foreach( $this->get( 'nodes', [] ) as $item ) : ?>
		<?php if( $item->getStatus() > 0 ) : ?>
			<?php $params = array_merge( $this->get( 'params', [] ), ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ) ?>

            <li class="nav-item">
                <a href="<?= $enc->attr( $this->url( $item->getTarget() ?: $target, $controller, $action, $params, [], $config ) ) ?>" class="nav-link">
                     <span ><?= $enc->html( $item->getName(), $enc::TRUST ) ?></span>
                </a>
            
        

            <?php if( count( $item->getChildren() ) > 0 ) : ?>

                <ul class="dropdown">
                    <?= $this->partial( 'newmenu/design1/tree-printer', [
                                'nodes' => $item->getChildren(),
                                'path' => $this->get( 'path', map() ),
                                'level' => $this->get( 'level', 0 ) + 1,
                                'params' => $this->get( 'params', [] )
                    ] ) ?>
                </ul>

            <?php endif ?>

            

            </li>

        <?php endif ?>
<?php endforeach ?>