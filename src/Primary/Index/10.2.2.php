<?php
	header("content-Type: text/html; charset=UTF-8");
	echo '随机数：'.rand(0, 99).'<br/>';
			
	function print_readdir($path) {
	    if (is_dir($path)) {
	        $dire=opendir($path);
	        echo '目录打开成功！';
	    }
	    else {
	        echo '打开目录失败，程序退出！';
	        exit();
	    }
	    while ($rea=readdir($dire)) {
	        echo $rea.'<br/>';
	    }
	    closedir($dire);
	}
	
	//print_readdir('d:/php');
	
	
?>