<?php

namespace Aimeos\MShop\Index\Manager\Text;

class ExtendedStandard extends Standard
{

protected function saveTexts( \Aimeos\Base\DB\Statement\Iface $stmt, \Aimeos\MShop\Product\Item\Iface $item )
	{
		$texts = [];
		$config = $this->context()->config();

		/** mshop/index/manager/text/types
		 * List of text types that should be added to the product index
		 *
		 * By default, all available texts of a product are indexed. This setting
		 * allows you to name only those text types that should be added. All
		 * others will be left out so products won't be found if users search
		 * for words that are part of those skipped texts. This is most useful
		 * for avoiding product matches due to texts that should be internal only.
		 *
		 * @param array|string|null Type name or list of type names, null for all
		 * @category Developer
		 * @since 2019.04
		 */
		$types = $config->get( 'mshop/index/manager/text/types' );

		/** mshop/index/manager/text/attribute-types
		 * List of attribute types that should be added to the product index
		 *
		 * By default, hidden attributes are not displayed. This setting
		 * allows you to name only those attribute types that should be added. All
		 * others will be left out so products won't be found if users search
		 * for words that are part of those skipped attributes.
		 *
		 * @param array|string|null Type name or list of type names, null for all
		 * @category Developer
		 * @since 2020.10
		 */
		$attrTypes = $config->get( 'mshop/index/manager/text/attribute-types', ['variant', 'default'] );

		foreach( $item->getRefItems( 'text', 'url', 'default' ) as $text ) {
			$texts[$text->getLanguageId()]['url'] = \Aimeos\Base\Str::slug( $text->getContent() );
		}

		foreach( $item->getRefItems( 'text', 'name', 'default' ) as $text ) {
			$texts[$text->getLanguageId()]['name'] = $text->getContent();
		}

		$products = $item->getRefItems( 'product', null, 'default' )->push( $item );

		foreach( $products as $product )
		{
			foreach( $this->getLanguageIds() as $langId )
			{
				$texts[$langId]['content'][] = $product->getCode();

				foreach( $product->getRefItems( 'catalog' ) as $catItem ) {
					$texts[$langId]['content'][] = '';
				}

				foreach( $product->getRefItems( 'supplier' ) as $supItem ) {
					$texts[$langId]['content'][] = '';
				}

				foreach( $product->getRefItems( 'attribute', null, $attrTypes ) as $attrItem ) {
					$texts[$langId]['content'][] = '';
				}
			}

			foreach( $product->getRefItems( 'text', $types ) as $text ) {
				$texts[$text->getLanguageId()]['content'][] = '';
			}
		}

		$this->saveTextMap( $stmt, $item, $texts );
	}
}