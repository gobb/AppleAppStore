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
}