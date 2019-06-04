<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 上午11:02
 */

namespace PhpDemo\Advance\Algorithm;


use PhpDemo\Advance\Structure\ListNode;

/**
 * Class SubjectLeetcode
 * @package PhpDemo\Advance\Algorithm
 */
class SubjectLeetcode
{
    public static function helloWorld()
    {
        echo hello_word('robotyang', 'ni hao leetcode');
    }

    /**
     * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
     * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
     *
     * 示例:
     * 给定 nums = [2, 7, 11, 15], target = 9
     * 因为 nums[0] + nums[1] = 2 + 7 = 9
     * 所以返回 [0, 1]
     */
    public static function findTowNumTargetByForce(array $nums, int $target)
    {
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [];
    }

    /**
     * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
     * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
     *
     * 示例:
     * 给定 nums = [2, 7, 11, 15], target = 9
     * 因为 nums[0] + nums[1] = 2 + 7 = 9
     * 所以返回 [0, 1]
     */
    public static function findTowNumTargetByMap(array $nums, int $target)
    {
        $maps = [];
        $len = count($nums);
        for ($j = 0; $j < $len; $j++) {
            $b = $nums[$j];
            $a = $target - $b;
            if (isset($maps[$a])) {
                $i = $maps[$a];
                return [$i, $j];
            }
            $maps[$b] = $j;
        }
        return [];
    }

    /**
     * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
     * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
     * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
     *
     * 示例：
     * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
     * 输出：7 -> 0 -> 8
     * 原因：342 + 465 = 807
     */
    public static function plusTowLinkListRecursive(ListNode $l1, ListNode $l2)
    {
        $l3 = new ListNode(0);
        $l3->val = $l1->val + $l2->val;

        $over = $l3->val >= 10;
        if ($over) {
            $l3->val = $l3->val - 10;
        }

        if ($l1->next || $l2->next) {
            if (!$l1->next) {
                $l1->next = new ListNode(0);
            }
            if (!$l2->next) {
                $l2->next = new ListNode(0);
            }
            if ($over) {
                $l1->next->val += 1;
            }
            $l3->next = self::plusTowLinkListRecursive($l1->next, $l2->next);
        } else {
            if ($over) {
                $l3->next = new ListNode(1);
            }
        }

        return $l3;
    }

    /**
     * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
     *
     * 示例 1:
     * 输入: "abcabcbb"
     * 输出: 3
     * 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
     * 示例 2:
     * 输入: "bbbbb"
     * 输出: 1
     * 解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
     * 示例 3:
     * 输入: "pwwkew"
     * 输出: 3
     * 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
     *
     * 请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。
     */
    public static function lengthNoRepeatLongestSubString($s)
    {
        $len = strlen($s);
        if ($len == 0 || $len == 1) return $len;
        else $max = 0;

        $subs = []; //debug
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                $p = $s{$j};
                $sub = substr($s, $i, $j - $i);
                $subOk = false;
                if (strpos($sub, $p) !== false) { //找到重复
                    $subOk = true;
                } else if ($j == $len - 1) {
                    $sub .= $p;
                    $subOk = true;
                }
                if ($subOk) {
                    $subs[] = $sub; //debug
                    $subLen = strlen($sub);
                    $max = $subLen > $max ? $subLen : $max;
                    break;
                }
            }
        }

        return $max;
    }

    /**
     * 给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
     *
     * 请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
     *
     * 你可以假设 nums1 和 nums2 不会同时为空。
     *
     * 示例 1:
     *
     * nums1 = [1, 3]
     * nums2 = [2]
     *
     * 则中位数是 2.0
     * 示例 2:
     *
     * nums1 = [1, 2]
     * nums2 = [3, 4]
     *
     * 则中位数是 (2 + 3)/2 = 2.5
     */
    public static function findSortedArraysMidSimple(array $nums1, array $nums2): float
    {
        $nums = array_merge($nums1, $nums2);
        sort($nums);

        $n = count($nums);
        $i = $n - 1;
        if ($n % 2 == 0) { //偶数
            $m = ($nums[$i / 2] + $nums[$i / 2 + 1]) / 2;
        } else {
            $m = $nums[($i + 1) / 2];
        }

        return $m;
    }

    /**
     * 给定两个大小为 m 和 n 的有序数组 nums1 和 nums2。
     *
     * 请你找出这两个有序数组的中位数，并且要求算法的时间复杂度为 O(log(m + n))。
     */
    public static function findSortedArraysMidByBinIns(array $nums1, array $nums2): float
    {
        $nums = $nums1;
        foreach ($nums2 as $nv2) {
            list($nums, $posi) = self::bisectionInsertionClassic($nums, $nv2);
        }

        $n = count($nums);
        $i = $n - 1;
        if ($n % 2 == 0) { //偶数
            $m = ($nums[$i / 2] + $nums[$i / 2 + 1]) / 2;
        } else {
            $m = $nums[($i + 1) / 2];
        }

        return $m;
    }

    /**
     * 二分查找插入
     * @param array $sarr
     * @param integer $val
     * @return array
     */
    public static function bisectionInsertionClassic(array $sarr, int $val): array
    {
        $cnt = count($sarr);
        $low = 0;
        $high = $cnt - 1;
        while ($low <= $high) {
            $mid = ceil(($low + $high) / 2);
            $mval = $sarr[$mid];
            if ($val > $mval) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        for ($i = $cnt; $i > $low; $i--) {
            $sarr[$i] = $sarr[$i - 1];
        }
        $sarr[$low] = $val;

        return [$sarr, $low];
    }

}