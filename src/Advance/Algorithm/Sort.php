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
     * 经典 选择排序
     * - b区 中最小的 val 排到 a区 最后
     * @param $arr
     * @return array
     */
    public static function selectionClassic($arr): array
    {
        for ($i = 0; $i < count($arr); $i++) { //a区
            $minI = $i;
            for ($j = $i + 1; $j < count($arr); $j++) { //b区
                if ($arr[$j] < $arr[$minI]) {
                    $minI = $j;
                }
            }
            list($arr[$i], $arr[$minI]) = [$arr[$minI], $arr[$i]]; //找到则跨段交换
        }

        return $arr;
    }

    /**
     * 经典 插入排序
     * - 将 b区 中的 val 依次插到 a区中 最合适的位置
     * @param $arr
     * @return array
     */
    public static function insertionClassic($arr): array
    {
        for ($j = 1; $j < count($arr); $j++) { //b区
            $cmp = $arr[$j];
            for ($i = $j - 1; $i >= 0; $i--) { //a区
                if ($cmp < $arr[$i]) { //不是最佳位置
                    list($arr[$i], $arr[$i + 1]) = [$cmp, $arr[$i]]; //找到则前移交换
                } else { //找到最佳位置
                    break;
                }
            }
        }

        return $arr;
    }

    /**
     * 经典 冒泡排序
     * - 依次两两交换, 直到从小到大
     * @param $arr
     * @return array
     */
    public static function bubbleClassic($arr): array
    {
        $len = count($arr);
        while (true) { //多轮循环
            $swap = false;
            for ($i = 1; $i < $len; $i++) {
                if ($arr[$i] < $arr[$i - 1]) {
                    list($arr[$i - 1], $arr[$i]) = [$arr[$i], $arr[$i - 1]]; //找到则前移交换
                    $swap = true;
                }
            }
            if ($i == $len && !$swap) {
                break;
            }
        }
        return $arr;
    }

    /**
     * 经典 快速排序
     * - 先从数列中 取出一个数 作为基准数 val
     * - 分区过程，将比这个数大的数 全放到它的右边，小于或等于它的数 全放到它的左边 (右找小, 左找大)
     * - 再对左右区间 重复第二步，直到各区间 只有一个数
     * @param $arr
     * @return array
     */
    public static function fastClassic($arr): array
    {
        /*进行循环比较, 最终结果是 val 左边都比它小，右边的都比它大*/
        $p = 0; //基准数 val 的位置
        $i = 0;
        $j = count($arr) - 1;
        $loopLeft = false;
        while ($i != $j) {
            if ($loopLeft) {
                if ($arr[$i] > $arr[$p]) {
                    list($arr[$p], $arr[$i]) = [$arr[$i], $arr[$p]];
                    $p = $i;
                    $loopLeft = false;
                } else {
                    $i++;
                }
            } else {
                if ($arr[$j] < $arr[$p]) {
                    list($arr[$p], $arr[$j]) = [$arr[$j], $arr[$p]];
                    $p = $j;
                    $loopLeft = true;
                } else {
                    $j--;
                }
            }
        }

        /*再对 val 左右区间 分别进行 快速排序*/
        $leftArr = array_slice($arr, 0, $p);
        $rightArr = array_slice($arr, $p + 1);
        if ($leftArr) {
            $leftSort = self::fastClassic($leftArr);
        }
        if ($rightArr) {
            $rightSort = self::fastClassic($rightArr);
        }
        $rrr = array_merge($leftSort ?? [], [$arr[$p]], $rightSort ?? []);

        return $rrr;
    }

    /**
     * 经典 希尔排序
     * - 设待排序元素序列有 n 个元素，首先取一个整数 increment（小于n）作为间隔 将全部元素分为 increment 个子序列
     * - 所有距离为 increment 的元素放在 同一个子序列中，在每一个子序列中分别实行直接插入排序。
     * - 然后缩小间隔increment，重复上述子序列划分和排序工作。
     * - 直到最后取increment=1，将所有元素放在同一个子序列中排序为止。
     * @param $arr
     * @return array
     */
    public static function shellClassicMine($arr): array
    {
        $len = count($arr);
        $inc = $len;
        while (true) {
            $inc = floor($inc / 3) + 1;

            /*分别获取子序列*/
            for ($i = 0; $i < $inc; $i++) {
                $steps = floor(($len - $i) / $inc); //根据间隔获取跳数

                /*获取子序列*/
                for ($si = 0; $si < $steps; $si++) {
                    $p = $i + $inc * $si;
                    $sub[] = $arr[$p];
                }

                /*执行插入排序*/
                $sub = self::insertionClassic($sub);

                /*排序后的值, 放回子序列所在位置*/
                for ($si = 0; $si < $steps; $si++) {
                    $p = $i + $inc * $si;
                    $arr[$p] = array_shift($sub);
                }
            }

            if ($inc == 1) {
                break;
            }
        }

        return $arr;
    }

    /**
     * 经典 希尔排序
     * - 设待排序元素序列有 n 个元素，首先取一个整数 increment（小于n）作为间隔 将全部元素分为 increment 个子序列
     * - 所有距离为 increment 的元素放在 同一个子序列中，在每一个子序列中分别实行直接插入排序。
     * - 然后缩小间隔increment，重复上述子序列划分和排序工作。
     * - 直到最后取increment=1，将所有元素放在同一个子序列中排序为止。
     * @param $arr
     * @return array
     */
    public static function shellClassicNet($arr): array
    {
        $len = count($arr);
        for ($inc = floor($len / 2); $inc > 0; $inc = floor($inc /= 2)) {
            for ($i = $inc; $i < $len; ++$i) {
                for ($j = $i - $inc; $j >= 0 && $arr[$j + $inc] < $arr[$j]; $j -= $inc) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + $inc];
                    $arr[$j + $inc] = $temp;
                }
            }
        }

        return $arr;
    }

    /**
     * 经典 归并排序
     * @param $arr
     * @return array
     */
    public static function mergeClassic($arr): array
    {
        return $arr;
    }

    /**
     * 经典 计数排序
     * - 将 b区 中的 val 依次插到 a区中 最合适的位置
     * - 计数排序的核心 在于将输入的数据值 转化为 键存储在 额外开辟的 数组空间中。
     * - 作为一种线性时间复杂度的排序，计数排序要求输入的数据 必须是有确定范围的整数。
     * @param $arr
     * @return array
     */
    public static function countClassic($arr): array
    {
        /*额外开辟的 存储计数的 数组空间*/
        $crr = array_fill(min($arr), max($arr), 0);

        /*依次计数*/
        foreach ($arr as $a) {
            $crr[$a]++;
        }

        /*依次取出*/
        $rrr = [];
        foreach ($crr as $c => $cnt) {
            while ($cnt > 0) {
                $rrr[] = $c;
                $cnt--;
            }
        }

        return $rrr;
    }

    /**
     * 经典 基数排序
     * @param $arr
     * @return array
     */
    public static function radixClassic($arr): array
    {
        return $arr;
    }

    /**
     * 经典 桶装排序
     * @param $arr
     * @return array
     */
    public static function bucketClassic($arr): array
    {
        return $arr;
    }

    /**
     * 经典 堆树排序
     * @param $arr
     * @return array
     */
    public static function heapClassic($arr): array
    {
        return $arr;
    }

    /**
     * 经典 二分插入排序
     * @param $arr
     * @return array
     */
    public static function bisectionInsertionClassic($arr): array
    {
        return $arr;
    }

    /**
     * 经典 随机快速排序
     * @param $arr
     * @return array
     */
    public static function randomFastClassic($arr): array
    {
        return $arr;
    }
}
