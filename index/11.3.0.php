<?php
	header("content-Type: text/html; charset=UTF-8");
	function print_randCode($w=200,$h=100) {
	    $image=imagecreate($w, $h);
	    $black=imagecolorallocate($image, 0, 0, 0);
	    $white=imagecolorallocate($image, 255, 255, 255);
	    
	    for ($i = 0; $i < 15; $i++) {
	        imageline($image, rand(0, 200), rand(0, 100), rand(0, 200), rand(0, 100), $white);	        
	    }
	    for ($i = 0; $i < 150; $i++) {
	        imagesetpixel($image, rand(0, 200), rand(0, 100), $white);
	    }
	    
	    for ($i = 0, $str=""; $i < 4; $i++) {
	        switch (rand(1, 3)) {
	            case 1:
	               $ch=rand(0, 9);
	               break;
	            case 2:
	               $ch=sprintf('%c',rand(97, 122));
	               break;
	            case 3:
	               $ch=sprintf('%c',rand(65, 90));
	               break;
	        }
	        $str.=$ch;
	    }
	    imagettftext($image, 40, rand(0, 15), 50, 70, $white, 'C:\Windows\Fonts\mingliu.ttc', $str);
	    
	    imagejpeg($image);
	    imagedestroy($image);
	}
	
	print_randCode();
?>