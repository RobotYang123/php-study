<?php
	header("content-Type: text/html; charset=UTF-8");
	$y=1993;
	$m=7;
	$d=1;
	$bir=mktime(0,0,0,$m,$d,$y);
	$now=mktime(0,0,0);
	$yea=(int)( ($now-$bir)/(365*24*60*60) );
	$mon=$yea*12;
	$day=$yea*365;
	echo $y.'年'.$m.'月'.$d.'日 出生，我已经过了大约: '.$yea.'年 ='.$mon.'月 ='.$day.'日<br/>';
	echo '当前时间：'.date('Y-m-d H:i:s | c').'<br/>';
    echo date_default_timezone_get().'<br/>';
	date_default_timezone_set('PRC');
	echo 'PRC 时间：'.date('Y-m-d H:i:s | c').'<br/>';
	
	function futureTime($day=0,$flag=1) {
	    $tempd=0;
	    $tempw="后";
	    if ($flag) {
	        $tempd=date('d')+$day;
	    }
	    else {
	        $tempd=date('d')-$day;
	        $tempw="前";
	    }
	    $ftime=mktime(0,0,0,date('m'),$tempd,date('Y'));
	    echo $day.'天'.$tempw.' 是：'.date('Y年m月d日',$ftime).'<br/>';
	}
	
	futureTime();
	futureTime(2,5);
	futureTime(100);
	futureTime(2,0);
	futureTime(100,0);
	
	echo '没有参数的 microtime：'.microtime().'<br/>';
	echo '参数True的microtiome：'.microtime(true).'<br/>';
	
	function TestMicrotime() {
	    $x=microtime(TRUE);    //程序 执行前 的时间戳
	    for ($i = 0; $i < 1000; $i++) {
	        
	    }
	    $y=microtime(TRUE);    //程序 执行后  的时间戳
	    $z=($y-$x)*1000000;
	    echo "测试函数程序一共执行了 $z 微秒";
	}
	
	TestMicrotime();
?>
	