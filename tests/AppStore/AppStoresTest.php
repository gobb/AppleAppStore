<?php

/**
 * This file is part of the AppleAppStore package
 *
 * (c) Vitaliy Zhuk <zhuk2205@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

use Apple\AppStore\AppStores;

/**
 * Store tests
 */
class AppStoresTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerCurrency
     */
    public function testCurrency($currency, $exists = true)
    {
        if (false === $exists) {
            $this->setExpectedException('InvalidArgumentException');
        }

        $priceTransformer = AppStores::getPriceTransformerByCurrency($currency);
    }

    /**
     * Provider for testing search price transformer by currecny
     */
    public function providerCurrency()
    {
        return array(
            array('foo', false),
            array('bar', false),
            array('RUB'),
            array('usd'),
            array('uah'),
            array('cad'),
            array('eur')
        );
    }

    /**
     * @dataProvider providerStores
     */
    public function testStores($country, $exists = true)
    {
        if (false === $exists) {
            $this->setExpectedException('InvalidArgumentException');
        }

        $store = AppStores::getAppStoreByCountry($country);
    }

    /**
     * Provider for testing search app stores
     */
    public function providerStores()
    {
        return array(
            array('foo', false),
            array('bar', false),
            array('RU'),
            array('us'),
            array('ua'),
            array('ca'),
            array('de'),
            array('es'),
            array('fr')
        );
    }
}