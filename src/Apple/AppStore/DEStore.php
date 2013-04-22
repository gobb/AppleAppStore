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
 * Germany store
 */
class DEStore extends AbstractStore
{
    /**
     * {@inheritDoc}
     */
    final public function getCountryISO()
    {
        return 'de';
    }

    /**
     * {@inheritDoc}
     */
    final public function getUriPrefix()
    {
        return 'de';
    }

    /**
     * Get default price transformer
     *
     * @return PriceTransformerInterface
     */
    public function getDefaultPriceTransformer()
    {
        return new EURPriceTransformer();
    }
}