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
 * Interface for control app stores
 */
interface AppStoreInterface
{
    /**
     * Get country ISO
     *
     * @see: http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     *
     * @return string
     */
    public function getCountryISO();

    /**
     * Get path prefix
     *
     * @return string
     */
    public function getUriPrefix();

    /**
     * Set price transformer
     *
     * @param PriceTransformerInterface $priceTransformer
     */
    public function setPriceTransformer(PriceTransformerInterface $priceTransformer);

    /**
     * Get price transformer
     *
     * @return PriceTransformerInterface
     */
    public function getPriceTransformer();

    /**
     * Get default price transformer
     *
     * @return PriceTrasnformerInterface
     */
    public function getDefaultPriceTransformer();
}
