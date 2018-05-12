<?php
	header("content-Type: image/jpeg; charset=UTF-8"); //修改为image/jpeg
	
	function test_image() {
	    imagecreate(100, 200)or die('创建普通画布失败！');
	    echo '创建普通画布成功！<br/>';
	    imagecreatetruecolor(200, 300)or die('创建真彩画布失败！');
	    echo '创建真彩画布成功！<br/>';
	}
	
	function test_image_color($red=0,$green=0,$blue=0) {
	    $image=imagecreate(200, 200);
	    imagecolorallocate($image, $red, $green, $blue);
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_imagefrom() {
	    $image1=imagecreatefromgif('http://www.baidu.com/img/baidu_sylogo1.gif');
	    $image2=imagecreatefromjpeg('D:\php\tmp\123.jpg');
	    
	    ob_clean();
	    
	    //imagegif($image1,'baidu.gif')or die('创建图像失败！');
	    //imagedestroy($image1);
	    imagejpeg($image1);
	    //imagejpeg($image2);
	    imagedestroy($image1);
	    imagedestroy($image2);
	}
	
	function test_imagefill() {
	    $image=imagecreatefromgif('http://www.baidu.com/img/baidu_sylogo1.gif');
	    $blue=imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
	    imagefill($image, 0, 0, $blue);
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_imege_pix($w=100,$h=100,$x=50,$y=50) {
	    $image=imagecreate($w, $h);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    
	    for ($i = 0; $i < 1000; $i++) {
	        imagesetpixel($image, rand(0, $w), rand(0, $h), $white);
	    }
	    imagesetpixel($image, $x, $y, $white);
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_line($w=200, $h=200) {
	    $image=imagecreate($w, $h);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    
	    //imageline($image, 0, 0, 200, 200, $white);
	    //imageline($image, 200, 0, 0, 200, $white);
	    
	    for ($i = 0; $i < 20; $i++) {
	        $color=imagecolorallocate($image, rand(0, 225), rand(0, 225), rand(0, 225));
	        imageline($image, rand(0, $w), rand(0, $h), rand(0, $w), rand(0, $h), $color);
	    }
	    
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_tangle($w=500,$h=500) {
	    $image=imagecreate($w, $h);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    imagerectangle($image, 5, 5, 125, 125, $black);
	    imagefilledrectangle($image, 150, 150, 450, 450, $black);

	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_poly($w=500,$h=500) {
	    $image=imagecreate($w, $h);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    
	    //$points=array(400,200,200,400,0,400,0,200,200,0);
	    //imagefilledpolygon($image, $points, rand(3, 5), $black);
	    
	    $points=array(rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400),rand(0, 400));
	    imagefilledpolygon($image, $points, 5, $black);
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_cir($w=500,$h=500) {
	    $image=imagecreate($w, $h);

	    $black=imagecolorallocate($image, 0, 0, 0);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    imageellipse($image, 50, 50, 90, 45, $white);
	    imagefilledellipse($image, 150, 150, 50, 50, $white);
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_darc($w=500,$h=500) {
	    $image=imagecreate($w, $h);

	    $white=imagecolorallocate($image, 255, 255, 255);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    
	    imagearc($image, 50, 50, 100, 100, 0, 270, $black);
	    imagefilledarc($image, 200, 50, 100, 100, 90, 45, $black,IMG_ARC_PIE);
	    imagefilledarc($image, 350, 50, 100, 100, 90, 45, $black,IMG_ARC_CHORD);
	    imagefilledarc($image, 50, 200, 100, 100, 90, 45, $black,IMG_ARC_NOFILL);
	    imagefilledarc($image, 200, 200, 100, 100, 90, 45, $black,IMG_ARC_EDGED);
	    imagefilledarc($image, 350, 200, 100, 100, 90, 45, $black,IMG_ARC_EDGED|IMG_ARC_NOFILL);
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
    function test_image_darc3D($w=500,$h=500) {
	    $image=imagecreate($w, $h);

	    $white=imagecolorallocate($image, 255, 255, 255);
	    $gray=imagecolorallocate($image, 192, 192, 192);
	    $darkgray=imagecolorallocate($image, 90, 90, 90);
	    $navy=imagecolorallocate($image, 0, 0, 80);
	    $darknavy=imagecolorallocate($image, 0, 0, 50);
	    $red=imagecolorallocate($image, 255, 0, 0);
	    $darkred=imagecolorallocate($image, 90, 0, 0);
	    
	    for ($i = 160; $i > 150; $i--) {
	        imagefilledarc($image, 200, $i, 400, 200, 0, 45, $darknavy,IMG_ARC_PIE);
	        imagefilledarc($image, 200, $i, 400, 200, 45, 75, $darkgray,IMG_ARC_PIE);
	        imagefilledarc($image, 200, $i, 400, 200, 70, 360, $darkred,IMG_ARC_PIE);
	    }
        imagefilledarc($image, 200, $i, 400, 200, 0, 45, $navy,IMG_ARC_PIE);
        imagefilledarc($image, 200, $i, 400, 200, 45, 75, $gray,IMG_ARC_PIE);
        imagefilledarc($image, 200, $i, 400, 200, 70, 360, $red,IMG_ARC_PIE);	    
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	function test_image_ttf($w=500,$h=500) {
	    $image=imagecreate($w, $h);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    $str='Hello PHP!';
	    imagettftext($image, 55, 0, 50, 250, $black, 'C:\Windows\Fonts\Arial.ttf', $str);
	    imagettftext($image, 55, 90, 250, 400, $black, 'C:\Windows\Fonts\Arial.ttf', $str);
	    imagettftext($image, 55, 45, 100, 370, $black, 'C:\Windows\Fonts\Arial.ttf', $str);
	    imagettftext($image, 55, 135, 370, 330, $black, 'C:\Windows\Fonts\Arial.ttf', $str);
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	test_image_ttf();
	
?>