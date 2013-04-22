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

/**
 * Euro price transformer
 */
class EURPriceTransformer extends AbstractPriceTransformer
{
    /**
     * {@inheritDoc}
     */
    public function getCurrency()
    {
        return 'EUR';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPrices()
    {
        return array(
            '0.99' => 0.89,
            '1.99' => 1.79,
            '2.99' => 2.69,
            '3.99' => 3.59,
            '4.99' => 4.49,
            '5.99' => 5.49,
            '6.99' => 5.99,
            '7.99' => 6.99,
            '8.99' => 7.99,
            '9.99' => 8.99,
            '10.99' => 9.99,
            '11.99' => 10.99,
            '12.99' => 11.99,
            '13.99' => 12.99,
            '14.99' => 13.99,
            '15.99' => 14.49,
            '16.99' => 14.99,
            '17.99' => 15.99,
            '18.99' => 16.99,
            '19.99' => 17.99,
            '20.99' => 18.99,
            '21.99' => 19.99,
            '22.99' => 20.99,
            '23.99' => 21.49,
            '24.99' => 21.99,
            '25.99' => 22.99,
            '26.99' => 23.99,
            '27.99' => 24.99,
            '28.99' => 25.99,
            '29.99' => 26.99,
            '30.99' => 27.99,
            '31.99' => 28.99,
            '32.99' => 29.49,
            '33.99' => 29.99,
            '34.99' => 30.99,
            '35.99' => 31.99,
            '36.99' => 32.99,
            '37.99' => 33.99,
            '38.99' => 34.99,
            '39.99' => 35.99,
            '40.99' => 36.99,
            '41.99' => 37.49,
            '42.99' => 37.99,
            '43.99' => 38.99,
            '44.99' => 39.99,
            '45.99' => 40.99,
            '46.99' => 41.99,
            '47.99' => 42.99,
            '48.99' => 43.99,
            '49.99' => 44.99,
            '54.99' => 49.99,
            '59.99' => 54.99,
            '64.99' => 59.99,
            '69.99' => 62.99,
            '74.99' => 64.99,
            '79.99' => 69.99,
            '84.99' => 74.99,
            '89.99' => 79.99,
            '94.99' => 84.99,
            '99.99' => 89.99,
            '109.99' => 94.99,
            '119.99' => 99.99,
            '124.99' => 104.99,
            '129.99' => 109.99,
            '139.99' => 119.99,
            '149.99' => 129.99,
            '159.99' => 139.99,
            '169.99' => 149.99,
            '174.99' => 154.99,
            '179.99' => 159.99,
            '189.99' => 169.99,
            '199.99' => 179.99,
            '209.99' => 189.99,
            '219.99' => 199.99,
            '229.99' => 209.99,
            '239.99' => 219.99,
            '249.99' => 229.99,
            '299.99' => 269.99,
            '349.99' => 319.99,
            '399.99' => 359.99,
            '449.99' => 399.99,
            '499.99' => 449.99,
            '599.99' => 549.99,
            '699.99' => 639.99,
            '799.99' => 719.99,
            '899.99' => 799.99,
            '999.99' => 899.99
        );
    }
}