<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2022
 */


return array(
	'table' => array(
		

        'mshop_index_keyword' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine = 'InnoDB';

            $table->id()->primary( 'pk_msindkey_id' );
            $table->int( 'prodid' );
			$table->string( 'siteid' );
            $table->refid( 'keyid' );
            $table->datetime( 'mtime' );

            $table->unique(['prodid','keyid', 'siteid'],'unq_msindkey_pid_kid_sid');
            $table->index(['prodid','keyid', 'siteid'],'idx_msindkey_pid_kid_sid');

        },


        // adding primary key index to all the existing Product Indexing Tables  --start

            'mshop_index_attribute' => function( \Aimeos\Upscheme\Schema\Table $table ) {
                $table->id();                
            },

            'mshop_index_catalog' => function( \Aimeos\Upscheme\Schema\Table $table ) {
                $table->id();                
            },

            'mshop_index_price' => function( \Aimeos\Upscheme\Schema\Table $table ) {
                $table->id();                
            },

            'mshop_index_supplier' => function( \Aimeos\Upscheme\Schema\Table $table ) {
                $table->id();                
            },

            'mshop_index_text' => function( \Aimeos\Upscheme\Schema\Table $table ) {
                $table->id();                
            },

       // adding primary key index to all the existing Product Indexing Tables  --end

       'mshop_index_text' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->string( 'url', 500);
			$table->string( 'name', 500);
       },

	),
);

