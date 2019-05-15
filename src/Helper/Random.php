<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午5:42
 */

namespace PhpDemo\Helper;

class Random
{
    /**
     * Generate random num array
     * @param $num
     * @param $min
     * @param $max
     * @return array
     */
    public static function nums($num, $min, $max): array
    {
        $arr = [];
        while ($num > 0) {
            $arr[] = rand($min, $max);
            $num--;
        }
        return $arr;
    }

    /**
     * Generate random tree line array
     * @return array
     */
    public static function treeLine(): array
    {
    }

    /**
     * Generate random tree multi array
     * @return array
     */
    public static function treeMulti(): array
    {
    }
}
