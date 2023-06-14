<?php



namespace Aimeos\MShop\Keyword\Item;


/**
 * Interface for supplier DTO objects used by the shop.
 *
 * @package MShop
 * @subpackage Keyword
 */
interface Iface
	extends \Aimeos\MShop\Common\Item\Iface, \Aimeos\MShop\Common\Item\AddressRef\Iface,
		\Aimeos\MShop\Common\Item\ListsRef\Iface, 
		\Aimeos\MShop\Common\Item\Status\Iface
{
	/**
	 * Returns the label of the supplier item.
	 *
	 * @return string label of the supplier item
	 */
	public function getKeyword() : string;

	/**
	 * Sets the new label of the supplier item.
	 *
	 * @param string $value label of the supplier item
	 * @return \Aimeos\MShop\Keyword\Item\Iface Keyword item for chaining method calls
	 */
	public function setKeyword( string $value ) : \Aimeos\MShop\Keyword\Item\Iface;

	
}