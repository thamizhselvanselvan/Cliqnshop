<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2020-2023
 * @package MShop
 * @subpackage Keyword
 */


namespace Aimeos\MShop\Keyword\Manager;


/**
 * Default review manager implementation
 *
 * @package MShop
 * @subpackage Keyword
 */
class Standard
	extends \Aimeos\MShop\Common\Manager\Base
	implements \Aimeos\MShop\Keyword\Manager\Iface, \Aimeos\MShop\Common\Manager\Factory\Iface
{
	
    private $searchConfig = array(
		'keyword.id' => array(
			'code' => 'keyword.id',
			'internalcode' => 'mkey."id"',
			'label' => 'Review ID',
			'type' => 'integer',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_INT,
		),
		'keyword.siteid' => array(
			'code' => 'keyword.siteid',
			'internalcode' => 'mkey."siteid"',
			'label' => 'Site ID',
			'type' => 'string',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		
		'keyword.keyword' => array(
			'code' => 'keyword.keyword',
			'internalcode' => 'mkey."keyword"',
			'label' => 'Keyword',
			'type' => 'string',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		
		'keyword.status' => array(
			'code' => 'keyword.status',
			'internalcode' => 'mkey."status"',
			'label' => 'Review status',
			'type' => 'integer',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_INT,
		),
		
		'keyword.mtime' => array(
			'code' => 'keyword.mtime',
			'internalcode' => 'mkey."mtime"',
			'label' => 'Modify date/time',
			'type' => 'datetime',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
        'keyword.ctime' => array(
			'code' => 'keyword.ctime',
			'internalcode' => 'mkey."ctime"',
			'label' => 'Create date/time',
			'type' => 'datetime',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
		'keyword.editor' => array(
			'code' => 'keyword.editor',
			'internalcode' => 'mkey."editor"',
			'label' => 'Editor',
			'type' => 'string',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
			'public' => false,
		),
	);


    public function __construct( \Aimeos\MShop\ContextIface $context )
	{
		parent::__construct( $context );		
		$this->setResourceName( $context->config()->get( 'mshop/keyword/manager/resource', 'db-keyword' ) );
	}
    
    // interface method
    public function create( array $values = [] ) : \Aimeos\MShop\Common\Item\Iface
	{
		$values['keyword.siteid'] = $values['keyword.siteid'] ?? $this->context()->locale()->getSiteId();
		return $this->createItemBase( $values );
	}

    public function get( string $id, array $ref = [], ?bool $default = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->getItemBase( 'keyword.id', $id, $ref, $default );
	}

    public function delete( $itemIds ) : \Aimeos\MShop\Common\Manager\Iface
	{
		
		$path = 'mshop/keyword/manager/delete';

		return $this->deleteItemsBase( $itemIds, $path );
	}

    // interface method
    public function getResourceType( bool $withsub = true ) : array
	{
		$path = 'mshop/keyword/manager/submanagers';
		return $this->getResourceTypeBase( 'keyword', $path, [], $withsub );
	}

    // interface method
    public function getSearchAttributes( bool $withsub = true ) : array
	{
		
		$path = 'mshop/keyword/manager/submanagers';
		return $this->getSearchAttributesBase( $this->searchConfig, $path, [], $withsub );
	}

    public function search( \Aimeos\Base\Criteria\Iface $search, array $ref = [], int &$total = null ) : \Aimeos\Map
	{
        $context = $this->context();
		$conn = $context->db( $this->getResourceName() );
		$items = [];

			$required = ['keyword'];

			
			$level = \Aimeos\MShop\Locale\Manager\Base::SITE_SUBTREE;
			$level = $context->config()->get( 'mshop/keyword/manager/sitemode', $level );

		
			$cfgPathSearch = 'mshop/keyword/manager/search';

			$cfgPathCount = 'mshop/keyword/manager/count';
            
			$results = $this->searchItemsBase( $conn, $search, $cfgPathSearch, $cfgPathCount,
            $required, $total, $level );
            
            
			try
			{
				while( ( $row = $results->fetch() ) !== null ) {
                    
					$items[$row['keyword.id']] = $this->applyFilter( $this->createItemBase( $row ) );
				}
			}
			catch( \Exception $e )
			{
				$results->finish();
				throw $e;
			}

		return map( $items );
	}

    public function filter( ?bool $default = false, bool $site = false ) : \Aimeos\Base\Criteria\Iface
	{
		return $this->filterBase( 'keyword', $default );
	}

    // interface method
    public function getSubManager( string $manager, string $name = null ) : \Aimeos\MShop\Common\Manager\Iface
	{
		return $this->getSubManagerBase( 'keyword', $manager, $name );
	}

    protected function createItemBase( array $values = [], array $listitems = [], array $refItems = [],
		array $addresses = [] ) : \Aimeos\MShop\Common\Item\Iface
	{
		return new \Aimeos\MShop\Keyword\Item\Standard( $values, $listitems, $refItems, $addresses );
	}
    

}