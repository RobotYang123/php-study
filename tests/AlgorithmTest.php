<?php
/**
 * Created by PhpStorm.
 * User: rbt
 * Date: 19-5-10
 * Time: 下午5:43
 */

namespace PhpDemoTests;

use PhpDemo\Advance\Algorithm\Sort;
use PhpDemo\Helper\Random;
use PHPUnit\Framework\TestCase;

class AlgorithmTest extends TestCase
{
    /**
     * Test sort
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
     * Test sort
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
     * Test sort
     */
    public function testBubbleClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::bubbleClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test sort
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
     * Test sort
     */
    public function testShellClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
//        $sort = Sort::shellClassicMine($rand);
        $sort = Sort::shellClassicNet($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test sort
     */
    public function testMergeClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::mergeClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test sort
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
     * Test Sort
     */
    public function testRadixClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::$rand($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Sort
     */
    public function testBucketClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::bucketClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Sort
     */
    public function testHeapClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::$rand($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Sort
     */
    public function testBisectionInsertionClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::bisectionInsertionClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

    /**
     * Test Sort
     */
    public function testRandomFastClassic()
    {
        $rand = Random::nums(10, 20, 50);

        $t1 = microtime(true);
        $sort = Sort::randomFastClassic($rand);
        $t2 = microtime(true);

        $data['time'] = round(($t2 - $t1) * 1000, 4) . 'ms';
        $data['mery'] = round(memory_get_usage() / 1024, 4) . 'kb';
        $data['rand'] = implode(',', $rand);
        $data['sort'] = implode(',', $sort);

        print_r($data);
        $this->assertTrue(true);
    }

}
