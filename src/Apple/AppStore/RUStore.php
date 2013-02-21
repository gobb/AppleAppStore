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
 * Russian Store
 */
class RUStore extends AbstractStore
{
    /**
     * {@inheritDoc}
     */
    final public function getCountryISO()
    {
        return 'ru';
    }

    /**
     * {@inheritDoc}
     */
    final public function getUriPrefix()
    {
        return 'ru';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPriceTransformer()
    {
        return new RUBPriceTransformer();
    }
}