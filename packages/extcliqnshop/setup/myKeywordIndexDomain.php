<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2021-2022
 */


namespace Aimeos\Upscheme\Task;


class myKeywordIndexDomain extends Base
{
	
	public function after() : array
    {
        return ['myKeywordDomain'] ;
    }


    public function up()
	{
        // creating FULLTEXT Index to mshop_keyword table --start
        $this->info( 'Creating keyword Index FULLTEXT schema', 'vv' );
		$db = $this->db( 'db-myKeywordIndexDomain' );

			if( !$db->hasIndex( 'mshop_keyword', 'idx_mskey_keyword' ) )
			{
				$this->info( 'Creating keyword fulltext index', 'vv' );

				$db->for( 'mysql', 'CREATE FULLTEXT INDEX `idx_mskey_keyword` ON `mshop_keyword` (`keyword`)' );

				try {
					$db->for( 'postgresql', 'CREATE INDEX "idx_mskey_keyword" ON "mshop_keyword" USING GIN (to_tsvector(\'english\', "keyword"))' );
				} catch( \Exception $e ) {
					// Doctrine DBAL bug: https://github.com/doctrine/dbal/issues/5351
				}
			}
			// creating FULLTEXT Index to mshop_keyword table --end
    }

    

}