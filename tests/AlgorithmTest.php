<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午5:43
 */

namespace PhpDemoTests;

use PhpDemo\Advance\Algorithm\Sort;
use PhpDemo\Advance\Unit\Random;
use PHPUnit\Framework\TestCase;

class AlgorithmTest extends TestCase
{
    /**
     * Test Classical selection sort
     */
    public function testSelectionClassic()
    {
        $randArr = Random::nums(10, 20, 50);
        echo "rand arr: " . implode(', ', $randArr) . "\n";

        $selArr = Sort::selectionClassic($randArr);
        echo "sel arr: " . implode(', ', $selArr) . "\n";

        $this->assertTrue(true);
    }
}
