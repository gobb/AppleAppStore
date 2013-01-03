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

use Apple\AppStore\AppStoreInterface,
    Apple\AppStore\PriceTransformerInterface;

/**
 * Abstract AppStore core
 */
abstract class AbstractStore implements AppStoreInterface
{
    /**
     * @var PriceTransformerInterface
     */
    protected $priceTransformer = NULL;

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
     * @{inerhitDoc}
     */
    public function getPriceTransformer()
    {
        if (!$this->priceTransformer) {
          throw new \LogicException('Undefined price transformer. Please set price trasnformer before get trasnfomert.');
        }

        return $this->priceTransformer;
    }

    /**
     * @{inerhitDoc}
     */
    public function setPriceTransformer(PriceTransformerInterface $priceTransformer)
    {
        $this->priceTransformer = $priceTransformer;

        return $this;
    }

    /**
     * @{inerhitDoc}
     */
    public function getUriPrefix()
    {
        return '';
    }
}