<?php

namespace Aimeos\MShop\Product\Manager\Decorator;

class ExtendedStandard extends \Aimeos\MShop\Common\Manager\Decorator\Base

{

    private $attr = array(
    'asin' => array(
    'code' => 'product.asin',
    'internalcode' => 'mpro."asin"',
    'label' => 'ASIN',
    'type' => 'string',
    'internaltype' => \Aimeos\Base\DB\Statement\Base::PARAM_STR,
)
);
public function getSaveAttributes() : array
    {
        return parent::getSaveAttributes() + $this->createAttributes( $this->attr );
    }

    public function getSearchAttributes( bool $sub = true ) : array
    {
        return parent::getSearchAttributes( $sub ) + $this->createAttributes( $this->attr );
    }
}
