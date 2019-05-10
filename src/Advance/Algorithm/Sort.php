<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午4:36
 */

namespace PhpDemo\Advance\Algorithm;

class Sort
{
    /**
     * Classical selection sort
     * @param $arr
     * @return array
     */
    public static function selectionClassic($arr): array
    {
        for ($i = 0; $i < count($arr); $i++) {
            $minInd = $i;
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$j] < $arr[$minInd]) {
                    $minInd = $j;
                }
            }
            list($arr[$i], $arr[$minInd]) = [$arr[$minInd], $arr[$i]];
        }
        return $arr;
    }
}
