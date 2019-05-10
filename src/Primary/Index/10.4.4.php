<html>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name='upfile[]' /><br/>
        <input type="file" name='upfile[]' /><br/>
        <input type="file" name='upfile[]' /><br/>
        <input type="submit" value='上传图片' />
    </form>
</html>

<?php
	header("content-Type: text/html; charset=UTF-8");
	if (!empty($_FILES)){
	    $tmpname=$_FILES['upfile']['tmp_name'];
	    $name=$_FILES['upfile']['name'];
	    
	    for ($i = 0; $i < count($tmpname); $i++) {
	        move_uploaded_file($tmpname[$i], 'tmp\\'.$name[$i])or die('文件上传失败，请重试！');
	        echo '文件上传成功！名为：'.$name[$i].'<br/>';
	    }
	    
	}
	else {
	    echo "<br/>没有上传文件";
	}
?>