<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyring and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Apple\AppStore\Stores;

/**
 * Default price transformer
 */
class DefaultPriceTransformer extends AbstractPriceTransformer
{
    /**
     * @{inerhitDoc}
     */
    public function transform($basePrice)
    {
        return $basePrice;
    }

    /**
     * @{inerhitDoc}
     */
    public function reverseTransform($price)
    {
        return $price;
    }

    /**
     * @{inerhitDoc}
     */
    public function setPrices(array $prices)
    {
        throw new \LogicException('Can\'t set prices map in default price transformer.');
    }

    /**
     * @{inerhitDoc}
     */
    public function getDefaultPrices()
    {
        return NULL;
    }
}