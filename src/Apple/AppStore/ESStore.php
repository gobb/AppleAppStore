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
 * ES Store
 */
class ESStore extends AbstractStore
{
    /**
     * {@inheritDoc}
     */
    final public function getCountryISO()
    {
        return 'es';
    }

    /**
     * {@inheritDoc}
     */
    final public function getUriPrefix()
    {
        return 'es';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPriceTransformer()
    {
        return new EURPriceTransformer();
    }
}