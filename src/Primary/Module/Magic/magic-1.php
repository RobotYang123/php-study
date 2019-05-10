
<?php
	
class Tools {
    
    /**
     * 利用魔术方法__call实现伪重载。。。
     * @return [type] [description]
     */
    public function __call($name, $args) {
        if ($name === "sum") {
            switch (count($args)) {
                case 2:
                    //求和：两个数
                    return $this->sum2($args[0], $args[1]);
                    break;
                case 3:
                    //求和：三个数
                    return $this->sum3($args[0], $args[1], $args[2]);
                    break;
            }
        }
    }

    /**
     * 利用魔术方法__callStatic实现伪重载。。。
     * @return [type] [description]
     */
    public static function __callStatic($name, $args) {
        if ($name === "area") {
            switch (count($args)) {
                case 1:
                    //计算圆的面积
                    return self::areaCircle($args[0]);
                    break;
                case 2:
                    //计算矩形的面积
                    return self::areaRectangle($args[0], $args[1]);
                    break;
            }
        }
    }

    /**
     * 计算圆的面积
     * @param  [type] $r [description]
     * @return [type]    [description]
     */
    public static function areaCircle($r) {
        return pi() * $r * $r;
    }

    /**
     * 计算矩形的面积
     * @param  [type] $length [description]
     * @param  [type] $width  [description]
     * @return [type]         [description]
     */
    public static function areaRectangle($length, $width) {
        return $length * $width;
    }

    /**
     * 求和：两个数
     * @param  [type] $num1 [description]
     * @param  [type] $num2 [description]
     * @return [type]       [description]
     */
    public function sum2($num1, $num2) {
        return $num1 + $num2;
    }

    /**
     * 求和：三个数
     * @param  [type] $length [description]
     * @param  [type] $width  [description]
     * @return [type]         [description]
     */
    public function sum3($num1, $num2, $num3) {
        return $num1 + $num2 + $num3;
    }
}

//测试开始

echo Tools::area(2) . "<br/>";

echo Tools::area(2, 4) . "<br/>";

$tools = new Tools();

echo $tools->sum(2, 3) . "<br/>";
echo $tools->sum(2, 3, 4) . "<br/>";


?>