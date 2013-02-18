<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyring and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Apple\AppStore;

/**
 * USD Price transformer
 */
class USDPriceTransformer extends AbstractPriceTransformer
{
    /**
     * {@inheritDoc}
     */
    public function getPriceCurrency()
    {
        return 'USD';
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