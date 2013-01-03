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
 * Russian Store
 */
class RUStore extends AbstractStore
{
    /**
     * @{inerhitDoc}
     */
    final public function getCountryISO()
    {
        return 'ru';
    }

    /**
     * @{inerhitDoc}
     */
    final public function getUriPrefix()
    {
        return 'ru';
    }

    /**
     * @{inerhitDoc}
     */
    public function getDefaultPriceTransformer()
    {
        return new RUPriceTransformer();
    }
}