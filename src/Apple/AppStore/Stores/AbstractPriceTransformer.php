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
 *
 * In price map use string type, because not correct float
 * variable as array key
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
     * {@inheritDoc}
     */
    public function setPrices(array $prices)
    {
        // Reset prices map
        $this->prices = array();

        foreach ($prices as $priceKey => $price) {
            $this->prices[(string) $priceKey] = (string) $price;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPrices()
    {
        return array();
    }

    /**
     * {@inheritDoc}
     */
    public function transform($basePrice)
    {
        if (!count($this->prices)) {
            throw new \LogicException('Can\'t transform price. Undefined prices map.');
        }

        $basePrice = (string) $basePrice;

        if (!isset($this->prices[$basePrice])) {
            throw new \InvalidArgumentException(sprintf('Can\'t transform price "%s". Not found price in prices map.', $basePrice));
        }

        return (float) $this->prices[$basePrice];
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($price)
    {
        if (!count($this->prices)) {
            throw new \LogicException('Can\'t transform price. Undefined prices map.');
        }

        $price = (string) $price;

        if(!$key = array_keys($this->prices, $price)) {
            throw new \InvalidArgumentException(sprintf('Can\'t reverse transform price "%s". Not found price in prices map.', $price));
        }

        if (count($key) > 1) {
            throw new \LogicException(sprintf('Can\'t reverse transform price. Many keys "%d".', count($key)));
        }

        list (, $key) = each($key);

        return (float) $key;
    }

    /**
     * {@inheritDoc}
     */
    public function reverse($price)
    {
        return $this->reverseTransform($price);
    }
}