<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 7/7/2019
 * Time: 1:44 AM
 */

namespace MasoodRehman\Travelport\Util;


class Helper
{
    public static function splitPrice($PriceString)
    {
        $Currency = substr($PriceString, 0, 3);
        $Amount = substr($PriceString, 3);

        return array(
            "Currency" => $Currency,
            "Amount" => $Amount
        );
    }
}