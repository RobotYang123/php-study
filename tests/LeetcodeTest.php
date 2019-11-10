<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 下午4:52
 */

namespace PhpDemoTests;

use PhpDemo\Advance\Algorithm\LinkList;
use PhpDemo\Advance\Algorithm\SubjectLeetcode;
use PHPUnit\Framework\TestCase;

class LeetcodeTest extends TestCase
{
    public function testFindTowNumTarget()
    {
        $nums = [6, 11, 5, 1, 4, 12, 10, 15];

        $res = SubjectLeetcode::findTowNumTargetByForce($nums, 14);
        print_r($res);

        $res = SubjectLeetcode::findTowNumTargetByMap($nums, 14);
        print_r($res);

        $this->assertTrue(true);
    }

    public function testPlusTowLinkList()
    {
        $l1 = LinkList::toList([2, 4, 3, 1]);
        $l2 = LinkList::toList([5, 6, 4]);

//        $l1 = LinkList::toList([5]);
//        $l2 = LinkList::toList([5]);

//        $l1 = LinkList::toList([9]);
//        $l2 = LinkList::toList([9]);

        $res = SubjectLeetcode::plusTowLinkListRecursive($l1, $l2);
        print_r($res);

        $this->assertTrue(true);
    }

    public function testLengthNoRepeatSubString()
    {
        $s = 'asdfasd';
        $a = $s{2};
        $b = substr($s, 2, 5);

        $s = 'abc';
        $s = 'abcabcbdb';
        $s = 'bbbbb';
//        $s = 'pwwkew';
//        $s = 'ohvhjdml';
//        $s = '';
//        $s = ' ';
//        $s = 'ab cdef g  hij';
        $res = SubjectLeetcode::lengthNoRepeatLongestSubString($s);
        print_r($res);

        $this->assertTrue(true);
    }

    public function testLengthNoRepeatLongestSubString()
    {
//        $arr1 = [20, 23, 23, 29, 32, ];
//        $arr2 = [21, 25, 33, ];
        $arr1 = [10, 20, 20,];
        $arr2 = [20, 30];

        $res['simple'] = SubjectLeetcode::findSortedArraysMidSimple($arr1, $arr2);
        $res['binins'] = SubjectLeetcode::findSortedArraysMidByBinIns($arr1, $arr2);

        $this->assertTrue(true);
    }

    public function testDivide()
    {
        SubjectLeetcode::divide(100, 3);
    }
}
