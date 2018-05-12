<?php
	header("content-Type: text/html; charset=UTF-8");
	$rows=8;
	while ($rows-->4) {
	    echo $rows;
	    if ($rows==6) {
	       include 'include2.php';
	    }
	}
	echo'<br/>';
	echo'<br/>';
?>
<html>
    <body>
        <a href="#" onClick="<?php echo '我是测试输出' ?>">点击我测试</a>
    </body>
</html>