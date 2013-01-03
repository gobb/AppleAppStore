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

use Apple\AppStore\PriceTransformerInterface;

/**
 * Abstract core for price transformer
 */
abstract class AbstractPriceTransformer implements PriceTransformerInterface
{
    /**
     * @var array
     */
    protected $prices = array();

    /**
     * Construct
     */
    public function __construct()
    {
        if ($prices = $this->getDefaultPrices()) {
            if (!is_array($prices)) {
                throw new \InvalidArgumentException(sprintf('Method "getDefaultPrices" must be return integer, "%s" given.', gettype($prices)));
            }

            $this->setPrices($prices);
        }
    }

    /**
     * @{inerhitDoc}
     */
    public function setPrices(array $prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @{inerhitDoc}
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @{inerhitDoc}
     */
    public function getDefaultPrices()
    {
        return array();
    }

    /**
     * @{inerhitDoc}
     */
    public function transform($basePrice)
    {
        if (!count($this->prices)) {
            throw new \LogicException('Can\'t transform price. Undefined prices map.');
        }

        $basePrice = (float) $basePrice;

        if (!isset($this->prices[$basePrice])) {
            throw new \InvalidArgumentException(sprintf('Can\'t transform price "%s". Not found price in prices map.', $basePrice));
        }

        return $this->prices[$basePrice];
    }

    /**
     * @{inerhitDoc}
     */
    public function reverseTransform($price)
    {
        if (!count($this->prices)) {
            throw new \LogicException('Can\'t transform price. Undefined prices map.');
        }

        $price = (float) $price;

        if(!$key = array_keys($this->prices, $price)) {
            throw new \InvalidArgumentException(sprintf('Can\'t reverse transform price "%s". Not found price in prices map.', $price));
        }

        if (count($key) > 1) {
            throw new \LogicException(sprintf('Can\'t reverse transform price. Many keys "%d".', count($key)));
        }

        list (, $key) = each($key);

        return $key;
    }

    /**
     * @{inerhitDoc}
     */
    public function reverse($price)
    {
        return $this->reverseTransform($price);
    }
}