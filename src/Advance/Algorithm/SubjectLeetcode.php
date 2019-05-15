<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 上午11:02
 */

namespace PhpDemo\Advance\Algorithm;


use PhpDemo\Advance\Structure\ListNode;

class SubjectLeetcode
{
    public static function helloWorld()
    {
        echo hello_word('robotyang', 'ni hao leetcode');
    }

    /**
     * Given an array of integers, return indices of the two numbers such that they add up to a specific target.
     * You may assume that each input would have exactly one solution, and you may not use the same element twice.
     *
     * Example:
     * Given nums = [2, 7, 11, 15], target = 9,
     * Because nums[0] + nums[1] = 2 + 7 = 9,
     * return [0, 1].
     */
    public static function findTowNumEqualTarget(array $nums, int $target)
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
     * You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order and each of their nodes contain a single digit. Add the two numbers and return it as a linked list.
     * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
     *
     * Example:
     * Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
     * Output: 7 -> 0 -> 8
     * Explanation: 342 + 465 = 807.
     */
    public static function plusTowLinkListInteger(ListNode $l1, ListNode $l2)
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
            $l3->next = self::plusTowLinkListInteger($l1->next, $l2->next);
        } else {
            if ($over) {
                $l3->next = new ListNode(1);
            }
        }

        return $l3;
    }
}