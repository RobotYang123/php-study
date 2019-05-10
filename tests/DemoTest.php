<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午4:57
 */

namespace PhpDemoTests;

use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    public function testSayHello()
    {
        echo 'hello world';

        $this->assertTrue(true);
    }
}
