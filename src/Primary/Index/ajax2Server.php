<?php
	header("content-Type: text/html; charset=UTF-8");
	$username = $_GET["username"];
	if ($username == "") {
	    $username = "<font color=red>请输入信息！</font>";
	}
	elseif ($username == "abc"){
	    $username = "<font color=red>该用户已被注册！</font>";
	}
	else {
	    $username = "<font color=blue>该用户可以注册！</font>";
	}
	echo $username;
	exit(0);
?>