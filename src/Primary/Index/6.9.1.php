<?php
	header("content-Type: text/html; charset=UTF-8");
		
	class ren2 {
	    public static $shuliang;
	    public $xingming;
	    public $nianling;
	    
	    function __construct() {
	        
	    }
	}
	
	$xiaoyang=new ren2();
	
	$a=1;
	$b=2;
	$c=$a/$b;
	echo "$a/$b=$c";
	
	if ($a>$b) {
	    error_log('这段程序进行了比较运算，且a>b');
	}
	else {
	    error_log('这段程序进行了比较运算，且a<b');
	}
?>