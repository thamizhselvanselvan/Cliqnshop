<?php

return array(
	'table' => array(

		'mshop_product' => function( \Aimeos\Upscheme\Schema\Table $table ) {
			$table->string( 'label', 500)->default( '' );
            $table->string( 'url', 500)->default( '' );
		},
	),
);
