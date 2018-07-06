<?php
/**
 * Created by PhpStorm.
 * User: RobotYang
 * Date: 2018/7/6
 * Time: 20:27
 */

new Niuke();

class Niuke
{
    public function __construct()
    {
//        echo 'hello niuke';
        $this->maxNumStr();
    }

    /**
     * 设有n(n<100)个正整数，将他们连接成一排，组成一个最大的多位整数。
     * 如:n=3时，m= 3个整数13,312,343,连成的最大整数为34331213。
     * 如:n=4时, m= 4个整数7,13,4,246连接成的最大整数为7424613。
     * N（N<=100），第二行包含N个数(每个数不超过1000，空格分开)。
     * 控制台分两行，分别输入如下
        2
        12 123
        4
        7 13 4 246
     * 输出
        12312
        7424613
     */
    public function maxNumStr() {
        while ($n = trim( fgets(STDIN)) ) {
            $m = trim( fgets(STDIN) );
            $m = explode(' ', $m);

            foreach ($m as $k => &$v) {
                $v = str_pad($v, 4, '0', STR_PAD_RIGHT) . '-' . strlen($v);
            }
            unset($v);
            rsort($m);

            foreach ($m as $k => &$v) {
                list($v, $len) = explode('-', $v);
                $v = substr($v, 0, $len);
            }
            unset($v);

            $str = implode('', $m);
            echo $str . "\n";
        }
    }

}