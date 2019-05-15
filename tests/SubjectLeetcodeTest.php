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

class SubjectLeetcodeTest extends TestCase
{
    public function testFindTowNumEqualTarget()
    {
        $nums = [6, 11, 5, 1, 4, 12, 10, 15];
        $res = SubjectLeetcode::findTowNumEqualTarget($nums, 14);

        print_r($res);
        $this->assertTrue(true);
    }

    public function testPlusTowLinkListInteger()
    {
        $l1 = LinkList::toList([2, 4, 3, 1]);
        $l2 = LinkList::toList([5, 6, 4]);

//        $l1 = LinkList::toList([5]);
//        $l2 = LinkList::toList([5]);

//        $l1 = LinkList::toList([9]);
//        $l2 = LinkList::toList([9]);

        $res = SubjectLeetcode::plusTowLinkListInteger($l1, $l2);

        print_r($res);
        $this->assertTrue(true);
    }
}
