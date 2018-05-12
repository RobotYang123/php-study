<?php
/**
 * Created by PhpStorm.
 * User: RobotYang
 * Date: 2017/10/23
 * Time: 18:11
 */

class Hgstest
{
    //1.一段长文字中有很多变量（1000个词中间有200个变量），如何简单地用程序输出这段长文字？
    public static function showStrWithVar()
    {
        list($a, $b, $c, $d, $e, $f, $g) = [11, 'df1', 33, 'xz2', 'aw3', 55, 88];
        $str = "{$a}阿斯蒂芬{$b}人情味儿{$b}爱上对方过后就哭了{$d}周传雄{$e}发放给{$f}";
        echo $str;
    }


    //2.如何反转一个字符串 （abcdef => fedcba 或 [你好世界 => 界世好你]）？
    public static function reverseArr($arr)
    {
        $len = count($arr);
        for ($i = 0; $i <= $len/2; $i++) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$len-1-$i];
            $arr[$len-$i-1] = $temp;
        }
        return $arr;
    }
    public static function reverseStrByPreg($str)
    {
        $arr = preg_split('/(?<!^)(?!$)/u', $str);

        $arr = self::reverseArr($arr);
        return implode('', $arr);
    }
    public static function reverseStrByMbsubstr($str)
    {
        for ($i = 0; $i < mb_strlen($str, 'UTF-8'); $i++) {
            $arr[] = mb_substr($str, $i, 1, 'UTF-8');
        }

        $arr = self::reverseArr($arr);
        return implode('', $arr);
    }


    //3.如何把一个字符串按指定长度切分成数组？( func(abcdefg, 2)=>[ab, cd, ef, g ],   func(abcdefg, 3) => [abc, def, g ] )
    public static function splitStrToArr($str, $range)
    {
        for ($i = 0; $i < mb_strlen($str, 'UTF-8'); $i++) {
            $arr[] = mb_substr($str, $i, $range, 'UTF-8');
            $i += $range;
        }
        return $arr;
    }


    //4.如何获得某个时间点(2017-10-21 10:15:20)前三天的时间戳(2017-10-18 10:15:20)？
    public static function getBeforeTimestamp($startDt, $day)
    {
        $newTs = strtotime(($day<0?"":"+").$day." day", strtotime($startDt));
        return $newTs;
    }


    //5.如何获得某个时间点(2017-10-21 10:15:20)所在自然月的起止时间戳(2017-10-01 00:00:00 和2017-10-31 23:59:59 )？
    public static function getDiffOfMonth($midDt)
    {
        $midTs = strtotime($midDt);
        $arr['startDt'] = date('Y-m', $midTs)."-01 00:00:00";
        $endTs = strtotime('+1 month', strtotime($arr['startDt']) ) - 1;
        $arr['endDt'] = date('Y-m-d H:i:s', $endTs);
        return $arr;
    }


    //6.如何获取一个kv数组中的所有key列表(  [a=>1, b=>2, c=>3,d=>4]   =>  [a,b,c,d]  )
    public static function getArrKeys($sarr, $retype=true)
    {
        foreach ($sarr as $k => $v) {
            $arr[] = $retype ? $k : $v;
        }
        return $arr;
    }


    //[ a,c,e,d,a,c,e,d ]
    //[ a,a,c,c,e,e,d,d ]
    //7.如何不利用另一个空数组变量，而把一个数组中的所有元素复制一个副本？(  [a,c,e,d]  =>  [ a,a,c,c,e,e,d,d ]  )
    public static function copyArrItem($sarr)
    {
        $cnt = count($sarr);
        for ($i = $cnt-1; $i >= 0; $i--) {
//            echo $i;
//            echo "\n";
//            print_r($sarr);
//            print_r("------------------\n");
            $left = $i ? array_slice($sarr,0, -$i) : $sarr;
            $right = array_slice($sarr, -($i+1));
//            print_r($left);
//            print_r($right);
            $sarr = array_merge( $left, $right);
//            print_r("------------------\n");
//            print_r($sarr);
//            print_r("--------------------------------------\n");
        }
//        print_r($sarr);
        return $sarr;
    }


    //8.如何把一个json字符串转换成一个数组？   如何把数组转成json字符串？
    //$data = ['a',['f',3,4,'g'],'e',[5,'h',[],'c'],'d',[],'i'];
    //$data = '["a",["f",3,4,"g"],"e",[5,"h",[],"c"],"d",[],"i"]';
    public static function parseJsonByFuc($data)
    {
        return is_array($data) ? json_encode($data) : json_decode($data);
    }

    public static function encodeJsonByMine($arr)
    {
        static $str = "";
        $oneArr = [];
        foreach ($arr as $v) {
            if ( is_array($v) ) {
                $oneArr[] = self::encodeJsonByMine($v);
            } else {
                $oneArr[] = (is_string($v)?"\"$v\"":$v);
            }
        }
        return '['.$str.implode(',', $oneArr).']';
    }


    //9.如何抛出和拦截一个异常，一个PHP的异常Exception 对象里面包含哪些内容？
    public static function getException($num)
    {
        if (!is_int($num)) {
            throw new Exception("Throw: The num is error type. Try again plese.");
        }
        try {
            if ($num < 0) {
                throw new Exception("Catch: The num is error value. Try again plese.");
            }
        } catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
            echo "\n";
            var_dump($e);
        }
    }


    //10.如何声明和使用一个类class，如何调用类中的静态static方法，如何调用类中的非静态方法？PHP的类如何构造和析构？
    public function testFuc()
    {
        echo "This is normal function\n";
    }
    public static function testStaticFnc()
    {
        echo "This is static function\n";
    }

    public function Hgstest()
    {
        echo "This is init by Hgstest \n";
    }
//    public function __construct()
//    {
//        echo "This is init by __construct \n";
//    }
    public function __destruct()
    {
        echo "This is over by __destruct \n";
    }


    //11.Php的命名空间如何使用？
}

//1.一段长文字中有很多变量（1000个词中间有200个变量），如何简单地用程序输出这段长文字？
//hgstest::showStrWithVar();


//2.如何反转一个字符串 （abcdef => fedcba 或 [你好世界 => 界世好你]）？
//$str = 'asdfasdf';
//$str = '阿斯sd$ #蒂，撒旦  法。是芬as';
//print_r($str);
//echo "\n";
//
//$restr = hgstest::reverseStrByPreg($str);
//print_r($restr);
//echo "\n";
//
//$restr = hgstest::reverseStrByMbsubstr($str);
//print_r($restr);
//echo "\n";


//3.如何把一个字符串按指定长度切分成数组？( func(abcdefg, 2)=>[ab, cd, ef, g ],   func(abcdefg, 3) => [abc, def, g ] )
//$str = '阿斯sd$ #蒂，撒旦  法。是芬as';
//$arr = hgstest::splitStrToArr($str,3);
//print_r($arr);


//4.如何获得某个时间点(2017-10-21 10:15:20)前三天的时间戳(2017-10-18 10:15:20)？
//$newTs = hgstest::getBeforeTimestamp("2017-10-21 10:15:20", -3);
//echo date('Y-m-d H:i:s', $newTs);


//5.如何获得某个时间点(2017-10-21 10:15:20)所在自然月的起止时间戳(2017-10-01 00:00:00 和2017-10-31 23:59:59 )？
//$arr = Hgstest::getDiffOfMonth('2017-11');
//$arr = Hgstest::getDiffOfMonth('2017-10-22 10:15:20');
//print_r($arr);


//6.如何获取一个kv数组中的所有key列表(  [a=>1, b=>2, c=>3,d=>4]   =>  [a,b,c,d]  )
//$arr = ['a'=>1, 'b'=>2, 'c'=>3, 'd'=>4];
//$arr = Hgstest::getArrKeys($arr);
//$arr = Hgstest::getArrKeys($arr, false);
//print_r($arr);


//7.如何不利用另一个空数组变量，而把一个数组中的所有元素复制一个副本？(  [a,c,e,d]  =>  [ a,a,c,c,e,e,d,d ] )
//$arr = ['a','e','e','c','d'];
//print_r($arr);
//$arr = Hgstest::copyArrItem($arr);
//print_r($arr);



//8.如何把一个json字符串转换成一个数组？   如何把数组转成json字符串？
//$data = ['a',['f',3,4,'g'],'e',[5,'h',[33,[],44],'c'],'d',[],'i'];
//$data = '["a",["f",3,4,"g"],"e",[5,"h",[33,[],44],"c"],"d",[],"i"]';
//$data = '["a",["f",3,4,"g"],"e",[5,"h",[33,[],44],"c"],"d",[],"i"]';
//$data = Hgstest::parseJsonByFuc($data);
//$data = Hgstest::encodeJsonByMine($data);
//$data = Hgstest::encodeJsonByMine($data);
//print_r($data);


//9.如何抛出和拦截一个异常，一个PHP的异常Exception 对象里面包含哪些内容？
//try {
//    Hgstest::getException('a');
//    Hgstest::getException(-1);
//} catch(Exception $e) {
//    echo 'Message: ' .$e->getMessage();
//    echo "\n";
//    var_dump($e);
//}



//10.如何声明和使用一个类class，如何调用类中的静态static方法，如何调用类中的非静态方法？PHP的类如何构造和析构？
//Hgstest::testStaticFnc();
//$Hgstest = new Hgstest();
//$Hgstest->testFuc();


//11.Php的命名空间如何使用？
//http://www.runoob.com/php/php-namespace.html