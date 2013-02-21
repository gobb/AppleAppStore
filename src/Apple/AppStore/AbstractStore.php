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

use Apple\AppStore\AppStoreInterface;
use Apple\AppStore\PriceTransformerInterface;

/**
 * Abstract AppStore core
 */
abstract class AbstractStore implements AppStoreInterface
{
    /**
     * @var PriceTransformerInterface
     */
    protected $priceTransformer;

    /**
     * Construct
     */
    public function __construct()
    {
        if ($priceTransformer = $this->getDefaultPriceTransformer()) {
            if (!$priceTransformer instanceof PriceTransformerInterface) {
                throw new \InvalidArgumentException('Method "getDefaultPriceTransformer" must be return PriceTransformerInterface.');
            }

            $this->priceTransformer = $priceTransformer;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getPriceTransformer()
    {
        if (!$this->priceTransformer) {
          throw new \LogicException('Undefined price transformer. Please set price trasnformer before get trasnfomert.');
        }

        return $this->priceTransformer;
    }

    /**
     * {@inheritDoc}
     */
    public function setPriceTransformer(PriceTransformerInterface $priceTransformer)
    {
        $this->priceTransformer = $priceTransformer;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getUriPrefix()
    {
        return '';
    }
}