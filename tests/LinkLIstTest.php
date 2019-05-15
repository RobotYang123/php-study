<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-15
 * Time: 下午5:47
 */

namespace PhpDemoTests;

use PhpDemo\Advance\Algorithm\LinkList;
use PHPUnit\Framework\TestCase;

class LinkLIstTest extends TestCase
{
    public function testToList()
    {
        $arr = [5, 1, 3, 4, 2];
        $list = LinkList::toList($arr);

        $this->assertTrue(true);
    }
}
