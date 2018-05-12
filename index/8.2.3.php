<?php
	header("content-Type: text/html; charset=UTF-8");
	echo nl2br("hello\nPHP!\n");
	
	$str='This is PHP!';
	echo "MD5加密：".md5($str)."<br/><br/>";
	
	$arr=array(1,3,67,'s','56','数组',4,'tr','89','php');
	$res=preg_grep('/[0-9]/', $arr,PREG_GREP_INVERT);
	print_r($res);
	
	$str2='A';
	$sea=array('A','B','C','D','E');
	$rep=array('B','C','D','E','F');
	echo '<br/>'.str_replace($sea, $rep, $str2).'<br/>';
	
	echo time().'<br/>';
?>