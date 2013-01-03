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
 * USA Store
 */
class USStore extends AbstractStore
{
    /**
     * @{inerhitDoc}
     */
    final public function getCountryISO()
    {
        return 'us';
    }

    /**
     * @{inerhitDoc}
     */
    final public function getUriPrefix()
    {
        return 'us';
    }

    /**
     * @{inerhitDoc}
     */
    public function getDefaultPriceTransformer()
    {
        return new DefaultPriceTransformer();
    }
}