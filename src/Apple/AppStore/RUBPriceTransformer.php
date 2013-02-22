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
 * RUB price transformer (Russia)
 */
class RUBPriceTransformer extends AbstractPriceTransformer
{
    /**
     * {@inheritDoc}
     */
    public function getCurrency()
    {
        return 'RUB';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPrices()
    {
        return array(
            '0.99' => 33,
            '1.99' => 66,
            '2.99' => 99,
            '3.99' => 129
            // todo: adds all prices...
        );
    }
}