<?php
    header("content-Type: text/html; charset=UTF-8");
    $arr=array('yi'=>'A1','er'=>'B2','sa'=>'C3','si'=>'D4','wu'=>'53','li'=>'53');
    while ($v=each($arr)){
        echo $v[0].'=>'.$v[1].'<br/>';
    }

    print_r(array_count_values($arr));

    echo '<br/〉sum=>'.array_sum($arr);
    
    class ren {
        public $xm;
        function __construct($name) {
            $this->xm=$name;
            echo '<br/>创建了一个对象<br/>';        
        }
        public function say(){
            echo '我叫'.$this->xm.'<br/>';
        }
        function __destruct(){
            echo '这个对象被销毁了';
        }
    }
    
    $xiaozhang=new ren('小张');
    //unset($xiaozhang);
    $xiaozhang->say();
?>
