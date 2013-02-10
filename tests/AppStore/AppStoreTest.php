<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyring and license information, please view the LICENSE
 * file that was distributed with this source code
 */

use Apple\AppStore\Stores;
use Apple\AppStore\AppStoreInterface;
use Apple\AppStore\PriceTransformerInterface;

/**
 * Store tests
 */
class AppStoreTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prices tests
     *
     * @param PriceTransformerInterface $priceTransformer
     */
    protected function pricesTest(PriceTransformerInterface $priceTransformer)
    {
        $oldPricesMap = $priceTransformer->getPrices();

        $priceTransformer
            ->setPrices(array(
                1 => 11,
                2 => 22,
                // Float variable
                '0.44' => 44
            ));

        $this->assertEquals($priceTransformer->transform(1), 11);
        $this->assertEquals($priceTransformer->transform(2), 22);
        $this->assertEquals($priceTransformer->transform(0.44), 44);

        $this->assertEquals($priceTransformer->reverse(44), 0.44);
        $this->assertEquals($priceTransformer->reverse(22), 2);
        $this->assertEquals($priceTransformer->reverse(11), 1);

        $this->assertEquals($priceTransformer->reverseTransform(11), 1);
        $this->assertEquals($priceTransformer->reverseTransform(22), 2);
        $this->assertEquals($priceTransformer->reverseTransform(44), 0.44);

        $this->assertEquals($priceTransformer->getPrices(), array(
           1 => 11,
           2 => 22,
           '0.44' => 44
        ));

        // Validate control error
        $priceTransformer->setPrices(array());

        try {
            $priceTransformer->transform(1);
            $this->fail(sprintf('Not control prices map in "%s" price transformer.', get_class($priceTransformer)));
        } catch (\LogicException $e) {
        }

        $priceTransformer
                ->setPrices($oldPricesMap);

        $this->assertEquals($priceTransformer->getPrices(), $oldPricesMap);
    }

    /**
     * @dataProvider providerStores
     */
    public function testStores(AppStoreInterface $store, $defaultPriceTransformer)
    {
        if ($defaultPriceTransformer) {
            $this->assertInstanceOf('Apple\AppStore\Stores\DefaultPriceTransformer', $store->getDefaultPriceTransformer());

            $this->assertEquals($store->getPriceTransformer()->transform(0.99), 0.99);
            $this->assertEquals($store->getPriceTransformer()->reverse(1.99), 1.99);
            $this->assertEquals($store->getPriceTransformer()->reverseTransform(0), 0);
        } else {
            $this->assertFalse(
                $store->getDefaultPriceTransformer() instanceof \Apple\AppStore\DefaultPriceTransformer,
                sprintf('Store "%s" can\'t have DefaultPriceTransformer', get_class($store))
            );

            $priceTransformer = $store->getDefaultPriceTransformer();
            $this->pricesTest($priceTransformer);
        }
    }

    /**
     * Stores provider
     */
    public function providerStores()
    {
        return array(
            array(new Stores\USStore, true),
            array(new Stores\RUStore, false)
        );
    }
}