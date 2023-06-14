<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */


return array(
	'manager' => array(
		
		
		
		'keyword' => array(
			'delete' => array(
				'ansi' => '
					DELETE FROM "mshop_index_keyword"
					WHERE :cond AND "siteid" LIKE ?
				'
			),
			'insert' => array(
				'ansi' => '
					INSERT INTO "mshop_index_keyword" (
						"prodid", "keyid","mtime", "siteid"
					) VALUES (
						?, ?, ?, ?
					)
				',
				'pgsql' => '
					INSERT INTO "mshop_index_keyword" (
						"prodid", "keyid", "mtime", "siteid"
					) VALUES (
						?, ?, ?, ?
					)
					ON CONFLICT DO NOTHING
				'
			),
			'search' => array(
				'ansi' => '
					SELECT mpro."id" :mincols
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY mpro."id"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
				'mysql' => '
					SELECT mpro."id" :mincols
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY mpro."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
			),
			'count' => array(
				'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mpro."id"
						FROM "mshop_product" mpro
						:joins
						WHERE :cond
						GROUP BY mpro."id"
						ORDER BY mpro."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
				'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mpro."id"
						FROM "mshop_product" mpro
						:joins
						WHERE :cond
						GROUP BY mpro."id"
						ORDER BY mpro."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
			),
			'cleanup' => array(
				'ansi' => '
					DELETE FROM "mshop_index_keyword"
					WHERE "mtime" < ? AND "siteid" LIKE ?
				'
			),
			'optimize' => array(
				'mysql' => array(
					'OPTIMIZE TABLE "mshop_index_keyword"',
				),
				'pgsql' => [],
				'sqlsrv' => [],
			),
		),
		
		'aggregate' => array(
			'ansi' => '
				SELECT :keys, :type("val") AS "value"
				FROM (
					SELECT :acols, :val AS "val" :mincols
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY :cols, :val, mpro."id"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				) AS list
				GROUP BY :keys
			',
			'mysql' => '
				SELECT :keys, :type("val") AS "value"
				FROM (
					SELECT :acols, :val AS "val" :mincols
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY :cols, :val, mpro."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				) AS list
				GROUP BY :keys
			'
		),
		'search' => array(
			'ansi' => '
				SELECT mpro."id" :mincols
				FROM "mshop_product" mpro
				:joins
				WHERE :cond
				GROUP BY mpro."id"
				ORDER BY :order
				OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
			',
			'mysql' => '
				SELECT mpro."id" :mincols
				FROM "mshop_product" mpro
				:joins
				WHERE :cond
				GROUP BY mpro."id"
				ORDER BY :order
				LIMIT :size OFFSET :start
			'
		),
		'count' => array(
			'ansi' => '
				SELECT COUNT(*) AS "count"
				FROM (
					SELECT mpro."id"
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY mpro."id"
					ORDER BY mpro."id"
					OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
				) AS list
			',
			'mysql' => '
				SELECT COUNT(*) AS "count"
				FROM (
					SELECT mpro."id"
					FROM "mshop_product" mpro
					:joins
					WHERE :cond
					GROUP BY mpro."id"
					ORDER BY mpro."id"
					LIMIT 10000 OFFSET 0
				) AS list
			'
		),
		'optimize' => array(
			'mysql' => array(
				'ANALYZE TABLE "mshop_product"',
				'ANALYZE TABLE "mshop_product_list"',
			),
			'pgsql' => [],
			'sqlsrv' => [],
		),
		'domains' => [
			'attribute' => 'attribute',
			'catalog' => 'catalog',
			'keyword' => 'keyword',
			'price' => ['default'],
			'product' => ['default'],
			'supplier' => 'supplier',
			'supplier/address' => 'supplier/address',
			'text' => 'text',
		],
		'submanagers' => [
			'attribute' => 'attribute',
			'supplier' => 'supplier',
			'keyword' => 'keyword',
			'catalog' => 'catalog',
			'price' => 'price',
			'text' => 'text',
		],
	),
);