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
 * Class for search app stores
 */
class AppStores
{
    /**
     * Get price transformer by currency
     *
     * @param string $currency
     * @param boolean $initialize
     *
     * @return array
     */
    public static function getPriceTransformerByCurrency($currency, $initialize = true)
    {
        $currency = strtoupper($currency);

        $classPriceTransformer = 'Apple\AppStore\\' . $currency . 'PriceTransformer';

        if (!class_exists($classPriceTransformer)) {
            throw new \InvalidArgumentException(sprintf(
                'Price transformer not found by currency: "%s".',
                $currency
            ));
        }

        return $initialize ? new $classPriceTransformer : $classPriceTransformer;
    }

    /**
     * Search app store by country ISO
     *
     * @param string $countryISO
     * @param boolean $initialize
     *
     * @return \Apple\AppStore\AppStoreInterface
     */
    public static function getAppStoreByCountry($countryISO, $initialize = true)
    {
        $countryISO = strtoupper($countryISO);

        $classAppStore = 'Apple\AppStore\\' . $countryISO . 'Store';

        if (!class_exists($classAppStore)) {
            throw new \InvalidArgumentException(sprintf(
                'Not found app store by country key: "%s".',
                $countryISO
            ));
        }

        return $initialize ? new $classAppStore : $classAppStore;
    }
}