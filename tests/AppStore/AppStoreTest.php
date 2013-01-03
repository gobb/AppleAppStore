<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyring and license information, please view the LICENSE
 * file that was distributed with this source code
 */

use Apple\AppStore\Stores,
    Apple\AppStore\AppStoreInterface,
    Apple\AppStore\PriceTransformerInterface;

/**
 * Store tests
 */
class AppStoreTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prices tests
     */
    protected function pricesTest(PriceTransformerInterface $priceTransformer)
    {
        $oldPricesMap = $priceTransformer->getPrices();

        $priceTransformer
            ->setPrices(array(
                1 => 11,
                2 => 22,
                3 => 33
            ));

        $this->assertEquals($priceTransformer->transform(1), 11);
        $this->assertEquals($priceTransformer->transform(2), 22);
        $this->assertEquals($priceTransformer->transform(3), 33);

        $this->assertEquals($priceTransformer->reverse(33), 3);
        $this->assertEquals($priceTransformer->reverse(22), 2);
        $this->assertEquals($priceTransformer->reverse(11), 1);

        $this->assertEquals($priceTransformer->reverseTransform(11), 1);
        $this->assertEquals($priceTransformer->reverseTransform(22), 2);
        $this->assertEquals($priceTransformer->reverseTransform(33), 3);

        $this->assertEquals($priceTransformer->getPrices(), array(
           1 => 11,
           2 => 22,
           3 => 33
        ));

        // Validate control error
        $priceTransformer
                ->setPrices(array());

        try {
            $priceTransformer->transform(1);
            $this->fail(sprintf('Not control prices map in %s price transformer.', get_class($priceTransformer)));
        }
        catch (\LogicException $e) {
            $this->assertTrue(TRUE);
        }

        $priceTransformer
                ->setPrices($oldPricesMap);

        $this->assertEquals($priceTransformer->getPrices(), $oldPricesMap);
    }

    /**
     * USA store test
     */
    public function testUSStore()
    {
        $store = new Stores\USStore();
        $this->assertTrue($store instanceof AppStoreInterface);
    }

    /**
     * US price transformer text
     */
    public function testUSStorePriceTransformer()
    {
        $store = new Stores\USStore();
        $this->assertEquals($store->getPriceTransformer()->transform(0.99), 0.99);
        $this->assertEquals($store->getPriceTransformer()->reverse(1.99), 1.99);
        $this->assertEquals($store->getPriceTransformer()->reverseTransform(0), 0);
    }

    /**
     * RU store test
     */
    public function testRUStore()
    {
        $store = new Stores\RUStore();
        $this->assertTrue($store instanceof AppStoreInterface);
        $this->pricesTest($store->getPriceTransformer());
    }
}