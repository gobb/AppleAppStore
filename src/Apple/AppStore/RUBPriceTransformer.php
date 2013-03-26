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
 * RUB price transformer (Russia)
 */
class RUBPriceTransformer extends AbstractPriceTransformer
{
    /**
     * {@inheritDoc}
     */
    public function getCurrency()
    {
        return 'RUB';
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultPrices()
    {
        return array(
            '0.99' => 33,
            '1.99' => 66,
            '2.99' => 99,
            '3.99' => 129,
            '4.99' => 169,
            '5.99' => 199,
            '6.99' => 229,
            '7.99' => 269,
            '8.99' => 299,
            '9.99' => 329,
            '10.99' => 349,
            '11.99' => 379,
            '12.99' => 399,
            '13.99' => 449,
            '14.99' => 479,
            '15.99' => 499,
            '16.99' => 549,
            '17.99' => 579,
            '18.99' => 599,
            '19.99' => 649,
            '20.99' => 679,
            '21.99' => 699,
            '22.99' => 749,
            '23.99' => 779,
            '24.99' => 799,
            '25.99' => 849,
            '26.99' => 879,
            '27.99' => 899,
            '28.99' => 949,
            '29.99' => 979,
            '30.99' => 999,
            '31.99' => 1029,
            '32.99' => 1049,
            '33.99' => 1099,
            '34.99' => 1129,
            '35.99' => 1149,
            '36.99' => 1199,
            '37.99' => 1229,
            '38.99' => 1249,
            '39.99' => 1299,
            '39.99' => 1299,
            '40.99' => 1329,
            '41.99' => 1349,
            '42.99' => 1399,
            '43.99' => 1429,
            '44.99' => 1449,
            '45.99' => 1499,
            '46.99' => 1529,
            '47.99' => 1549,
            '48.99' => 1590,
            '49.99' => 1690,
            '54.99' => 1790,
            '59.99' => 1990,
            '64.99' => 2090,
            '69.99' => 2290,
            '74.99' => 2490,
            '79.99' => 2690,
            '84.99' => 2790,
            '89.99' => 2990,
            '94.99' => 3090,
            '99.99' => 3290,
            '109.99' => 3490,
            '119.99' => 3790,
            '124.99' => 3890,
            '129.99' => 3990,
            '139.99' => 4490,
            '149.99' => 4790,
            '159.99' => 4990,
            '169.99' => 5490,
            '174.99' => 5690,
            '179.99' => 5790,
            '189.99' => 5990,
            '199.99' => 6490,
            '209.99' => 6790,
            '219.99' => 6990,
            '229.99' => 7490,
            '239.99' => 7790,
            '249.99' => 7990,
            '299.99' => 9790,
            '349.99' => 11490,
            '399.99' => 12990,
            '449.99' => 14990,
            '499.99' => 16990,
            '599.99' => 19990,
            '699.99' => 22990,
            '799.99' => 26990,
            '999.99' => 32990
        );
    }
}