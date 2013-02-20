<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyring and license information, please view the LICENSE
 * file that was distributed with this source code
 */

use Apple\AppStore as Stores;
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

        $this->assertEquals(11, $priceTransformer->transform(1));
        $this->assertEquals(22, $priceTransformer->transform(2));
        $this->assertEquals(44, $priceTransformer->transform(0.44));

        $this->assertEquals(0.44, $priceTransformer->reverse(44));
        $this->assertEquals(2, $priceTransformer->reverse(22));
        $this->assertEquals(1, $priceTransformer->reverse(11));

        $this->assertEquals(1, $priceTransformer->reverseTransform(11));
        $this->assertEquals(2, $priceTransformer->reverseTransform(22));
        $this->assertEquals(0.44, $priceTransformer->reverseTransform(44));

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

        $this->assertEquals($oldPricesMap, $priceTransformer->getPrices());
    }

    /**
     * @dataProvider providerStores
     */
    public function testStores(AppStoreInterface $store, $defaultPriceTransformer)
    {
        if ($defaultPriceTransformer) {
            $this->assertEquals(0.99, $store->getPriceTransformer()->transform(0.99));
            $this->assertEquals(1.99, $store->getPriceTransformer()->reverse(1.99));
            $this->assertEquals(0, $store->getPriceTransformer()->reverseTransform(0));
        } else {
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
            array(new Stores\RUStore, false),
            array(new Stores\USStore, true), // @todo: temporary usage default price transformer
            array(new Stores\CAStore, false)
        );
    }
}