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
 * Interface for control price transformers
 */
interface PriceTransformerInterface
{
    /**
     * Get prices
     *
     * @return array
     */
    public function getPrices();

    /**
     * Set prices
     *
     * @param array $prices
     */
    public function setPrices(array $prices);

    /**
     * Get default prices
     *
     * @return array
     */
    public function getDefaultPrices();

    /**
     * Base transform
     *
     * @param float $basePrice
     */
    public function transform($basePrice);

    /**
     * Reverse transform
     *
     * @param float $price
     */
    public function reverseTransform($price);
    public function reverse($price);

    /**
     * Get price currency
     *
     * @return string
     */
    public function getPriceCurrency();
}