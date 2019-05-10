<html>
<style type="text/css">
#upfile{
	width:65px;
	height:45px;
	//filter:alpha(opacity:0);
	//opacity: 0;
	//position:absolute;
	top:0;
}
</style>
<script type="text/javascript" language="javascript">
</script>

<body>
<div class="file-box"> 
    <form method="post" enctype="multipart/form-data">
        <input type="file" id='upfile' name='upfile' accept="image/jpeg" />
    	<input type="submit" value="立即上传"/>
    </form>
</div>
</html>
</body>
<?php
	header("content-Type: text/html; charset=UTF-8");
	if (!empty($_FILES)){
	    print_r($_FILES);
	    
	    $tmpname=$_FILES['upfile']['tmp_name'];
	    $name='tmp\\123.jpg';
	    move_uploaded_file($tmpname, $name)or die('文件上传失败，请重试！');
	    echo '文件上传成功！<br/>';
	    
	    foreach ($_FILES['upfile'] as $k=>$v){
	        echo "$k=>$v<br/>";
	    }
	}
	//else {
	//    echo "<br/>没有上传文件";
	//}
	
	//echo "<img src='tmp/123.jpg' />";
?>