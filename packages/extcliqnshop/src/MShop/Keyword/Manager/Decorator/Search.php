<?php

namespace Aimeos\MShop\Keyword\Manager\Decorator;


/**
 * Full keyword search config for Keyword
 */
class Search extends \Aimeos\MShop\Common\Manager\Decorator\Base
{
	private $attr = [
		'keyword:relevance' => array(
			'code' => 'keyword:relevance()',
			'internalcode' => 'MATCH( mkey."keyword" ) AGAINST( $1 IN BOOLEAN MODE )',
			'label' => 'Keyword texts, parameter(<search term>)',
			'type' => 'float',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_FLOAT,
			'public' => false,
		),
		'sort:keyword:relevance' => array(
			'code' => 'sort:keyword:relevance()',
			'internalcode' => 'MATCH( mkey."keyword" ) AGAINST( $1 IN BOOLEAN MODE )',
			'label' => 'Keyword text sorting, parameter(<search term>)',
			'type' => 'float',
			'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_FLOAT,
			'public' => false,
		),
	];

    public function __construct( \Aimeos\MShop\Common\Manager\Iface $manager, \Aimeos\MShop\ContextIface $context )
	{
		parent::__construct( $manager, $context );
		

		$func = function( $source, array $params ) {

			if( isset( $params[0] ) )
			{
				$str = '';
				$regex = '/(\&|\||\!|\-|\+|\>|\<|\(|\)|\~|\*|\:|\"|\'|\@|\\| )+/';
				$search = trim( mb_strtolower( preg_replace( $regex, ' ', $params[0] ) ), "' \t\n\r\0\x0B" );

				foreach( explode( ' ', $search ) as $part )
				{
					if( strlen( $part ) > 2 ) {
						$str .= '+' . $part . '* ';
					}
				}

				$params[0] = '\'' . $str . '\'';
			}

			return $params;
		};

		$this->attr['sort:keyword:relevance']['function'] = $func;
		$this->attr['keyword:relevance']['function'] = $func;
	}

    public function getSearchAttributes( bool $sub = true ) : array
	{
		return parent::getSearchAttributes( $sub ) + $this->createAttributes( $this->attr );
	}

}
