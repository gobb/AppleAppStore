<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Apple\AppStore;

/**
 * UAH Price transformer (Ukraine)
 *
 * Apple system not have a UAS Price transformer
 */
class UAHPriceTransformer extends AbstractPriceTransformer
{
    /**
     * {@inheritDoc}
     */
    public function getPriceCurrency()
    {
        return 'UAH';
    }

    /**
     * {@inheritDoc}
     */
    public function transform($basePrice)
    {
        return $basePrice;
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($price)
    {
        return $price;
    }
}