<?php


return array(
	'table' => array(

		'mshop_keyword' => function( \Aimeos\Upscheme\Schema\Table $table ) {

			$table->engine = 'InnoDB';



			$table->id()->primary( 'pk_mskey_id' );
			$table->string( 'siteid' );
            $table->string( 'keyword',500 );
            $table->smallint( 'status' )->default( 1 );
            $table->meta();


            $table->unique( ['siteid','keyword'], 'unq_mskey_sid_keyword' );
            $table->index( ['siteid'], 'idx_mskey_sid' );
            $table->index( ['status', 'siteid'], 'idx_mskey_status_sid' );

			
		},

		
	),
);
