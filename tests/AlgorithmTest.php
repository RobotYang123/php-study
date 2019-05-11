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
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::selectionClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Classical insertion sort
     */
    public function testInsertionClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::insertionClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Classical insertion sort
     */
    public function testCountClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::countClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Classical fast sort
     */
    public function testFastClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::fastClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Classical shell sort
     */
    public function testShellClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::shellClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }
}
