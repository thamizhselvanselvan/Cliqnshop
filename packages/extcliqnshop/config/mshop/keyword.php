<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2020-2023
 */


return array(
	'manager' => array(
		
		
		'search' => array(

            'mysql' => '
                            SELECT :columns
                            mkey."id" AS "keyword.id", mkey."siteid" AS "keyword.siteid",
                            mkey."keyword" AS "keyword.keyword",
                            mkey."status" AS "keyword.status", mkey."ctime" AS "keyword.ctime",
					        mkey."mtime" AS "keyword.mtime", mkey."editor" AS "keyword.editor"
                                FROM "mshop_keyword" mkey
                                :joins
                                WHERE :cond
                                GROUP BY :group mkey."id"
                                ORDER BY :order
                                LIMIT :size OFFSET :start            
            ',         
            

		),
		'count' => array(
			
			'mysql' => '
				SELECT COUNT(*) AS "count"
				FROM (
					SELECT mkey."id"
					FROM "mshop_keyword" mkey
					:joins
					WHERE :cond
					GROUP BY mkey."id"
					ORDER BY mkey."id"
					LIMIT 10000 OFFSET 0
				) AS list
			'
		),
		
	),
);