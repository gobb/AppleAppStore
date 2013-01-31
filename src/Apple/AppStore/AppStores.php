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
     * Search app store by country ISO
     *
     * @param string $countryISO
     * @param boolean $initialize
     *
     * @return \Apple\AppStore\AppStoreInterface
     */
    static public function getAppStoreByCountry($countryISO, $initialize = TRUE)
    {
        $countryISO = strtoupper($countryISO);

        $classAppStore = 'Apple\\AppStore\\Stores\\' . $countryISO . 'Store';

        if (!class_exists($classAppStore)) {
            throw new \InvalidArgumentException(sprintf(
                'Not found app store by country key: "%s".',
                $countryISO
            ));
        }

        return $initialize ? new $classAppStore : $classAppStore;
    }
}