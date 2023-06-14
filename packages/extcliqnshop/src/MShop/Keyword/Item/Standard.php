<?php

/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2023
 * @package MShop
 * @subpackage Supplier
 */


namespace Aimeos\MShop\Keyword\Item;

use \Aimeos\MShop\Common\Item\ListsRef;
use \Aimeos\MShop\Common\Item\AddressRef;


/**
 * Interface for supplier DTO objects used by the shop.
 *
 * @package MShop
 * @subpackage Supplier
 */
class Standard
	extends \Aimeos\MShop\Common\Item\Base
	implements \Aimeos\MShop\Keyword\Item\Iface
{
	use ListsRef\Traits, AddressRef\Traits  {
		ListsRef\Traits::__clone insteadof AddressRef\Traits;
		ListsRef\Traits::__clone as __cloneList;
		AddressRef\Traits::__clone as __cloneAddress;
	}


	/**
	 * Initializes the supplier item object
	 *
	 * @param array $values List of attributes that belong to the supplier item
	 * @param \Aimeos\MShop\Common\Item\Lists\Iface[] $listItems List of list items
	 * @param \Aimeos\MShop\Common\Item\Iface[] $refItems List of referenced items
	 */
	public function __construct( array $values = [], array $listItems = [], array $refItems = [], array $addresses = [] )
	{
		parent::__construct( 'keyword.', $values );

		$this->initListItems( $listItems, $refItems );
		$this->initAddressItems( $addresses );
	}


	/**
	 * Creates a deep clone of all objects
	 */
	public function __clone()
	{
		parent::__clone();
		$this->__cloneList();
		$this->__cloneAddress();
	}

    

	/**
	 * Returns the label of the supplier item.
	 *
	 * @return string label of the supplier item
	 */
	public function getKeyword() : string
	{
		return $this->get( 'keyword.keyword', '' );
    }


	/**
	 * Sets the new label of the supplier item.
	 *
	 * @param string $value label of the supplier item
	 * @return \Aimeos\MShop\Keyword\Item\Iface Keyword item for chaining method calls
	 */
	public function setKeyword( string $value ) : \Aimeos\MShop\Keyword\Item\Iface
	{
		return $this->set( 'keyword.keyword', $value );
	}


	
    /**
	 * Returns the item type
	 *
	 * @return string Item type, subtypes are separated by slashes
	 */
	public function getResourceType() : string
	{
		return 'keyword';
	}


	/**
	 * Tests if the item is available based on status, time, language and currency
	 *
	 * @return bool True if available, false if not
	 */
	public function isAvailable() : bool
	{
		return parent::isAvailable() && $this->getStatus() > 0;
	}


	/**
	 * Sets the item values from the given array and removes that entries from the list
	 *
	 * @param array &$list Associative list of item keys and their values
	 * @param bool True to set private properties too, false for public only
	 * @return \Aimeos\MShop\Keyword\Item\Iface Keyword item for chaining method calls
	 */
	public function fromArray( array &$list, bool $private = false ) : \Aimeos\MShop\Common\Item\Iface
	{
		$item = parent::fromArray( $list, $private );

		foreach( $list as $key => $value )
		{
			switch( $key )
			{
				case 'keyword.keyword': $item = $item->setKeyword( $value ); break;
				case 'keyword.status': $item = $item->setStatus( (int) $value ); break;
				default: continue 2;
			}

			unset( $list[$key] );
		}

		return $item;
	}

    /**
	 * Returns the status of the item
	 *
	 * @return int Status of the item
	 */
	public function getStatus() : int
	{
		return $this->get( 'keyword.status', 1 );
	}


	/**
	 * Sets the new status of the keyword item.
	 *
	 * @param int $value status of the keyword item
	 * @return \Aimeos\MShop\Supplier\Item\Iface Supplier item for chaining method calls
	 */
	public function setStatus( int $value ) : \Aimeos\MShop\Common\Item\Iface
	{
		return $this->set( 'keyword.status', $value );
	}


	/**
	 * Returns the item values as array.
	 *
	 * @param bool True to return private properties, false for public only
	 * @return array Associative list of item properties and their values
	 */
	public function toArray( bool $private = false ) : array
	{
		$list = parent::toArray( $private );

		
		$list['keyword.keyword'] = $this->getKeyword();
		$list['keyword.status'] = $this->getStatus();
		

		return $list;
	}

}