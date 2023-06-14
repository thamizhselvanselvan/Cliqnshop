<?php

$enc = $this->encoder();

?>


<!-- Navigation menu Tree  Starts here (default bg-primary) -->


<?php $this->block()->start( 'newmenu/design1/tree' ) ?>
<div class="demo demo1">
	<div class="my-nabarbg-primary">
		<ul class="my-navbar-nav">
			<li class="nav-close">
				<button class="btn-nav-close">
					<span class="close-btn">+</span>
				</button>
			</li>

             <!-- <li class="nav-item">
                <a href="#" class="nav-link">Team</a>
                <ul class="dropdown">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Dropdown1 lavel-1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Dropdown2 lavel-1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Dropdown3 lavel-1 </a>
                        <ul class="dropdown">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Dropdown lavel-2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Dropdown lavel-2</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Dropdown lavel-2 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->
            

            <?= $this->partial(
				'newmenu/design1/tree-printer', [
					'nodes' => $this->treeCatalogTree->getChildren(),
					'path' => $this->get( 'treeCatalogPath', map() ),
					'params' => [],
					'level' => 1
				] ) ?>
			
		</ul>
	</div>
</div>
<?php $this->block()->stop() ?>

<?= $this->block()->get( 'newmenu/design1/tree' ) ?>

<!-- navigation main menu tree ends here  -->