<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2018-2022
 * @package MShop
 * @subpackage Index
 */


namespace Aimeos\MShop\Index\Manager\Keyword;


/**
 * MySQL based index keyword for searching in product tables.
 *
 * @package MShop
 * @subpackage Index
 */
class MySQL
	extends \Aimeos\MShop\Index\Manager\Keyword\Standard
{
	
	private $searchConfig = array(
		'index.keyword.id' => array(
			'code' => 'index.keyword.id',
			'internalcode' => 'mindkey."keyid"',
			'internaldeps'=>array( 'LEFT JOIN "mshop_index_keyword" AS mindkey USE INDEX ("idx_msindkey_pid_kid_sid", "unq_msindkey_pid_kid_sid") ON mindkey."prodid" = mpro."id"' ),
			'label' => 'Product index keyword ID',
			'type' => 'string',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_INT,
			'public' => false,
		),
	);

	/**
	 * Returns a list of objects describing the available criterias for searching.
	 *
	 * @param bool $withsub Return also attributes of sub-managers if true
	 * @return \Aimeos\Base\Criteria\Attribute\Iface[] List of search attriubte items
	 */
	public function getSearchAttributes( bool $withsub = true ) : array
	{
		$list = parent::getSearchAttributes( $withsub );

		foreach( $this->searchConfig as $key => $fields ) {
			$list[$key] = new \Aimeos\Base\Criteria\Attribute\Standard( $fields );
		}

		return $list;
	}
}
