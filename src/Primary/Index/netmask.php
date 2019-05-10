<?php
	header("content-Type: text/html; charset=UTF-8");
	function chatoBit8($num)   //将一个数变成8位的二进制
	{
	    $bit=decbin($num);
	    $bits=str_split($bit);
	    $bitsCount=count($bits);
	    $bits8=null;
	    if ($bitsCount<8) {
	        for ($i = 0; $i < 8-$bitsCount; $i++) {    //位数不够的，前面补上0
	            $bits8=$bits8.'0';
	        }
	        for ($i = 0; $i < $bitsCount; $i++) {  //从0后开始补上原始数据，如0001 1011
	            $bits8=$bits8.$bits[$i];
	        }
	        return $bits8;
	    }else{
	        return $bit;
	    }
	}
	
	$zwStr='';$wlhStr='';
//     echo chatoBit8(128);
//     exit();
	if(!empty($_POST['ip'])){
	    $ip=$_POST['ip'];
	    $iparr=explode('.', $ip);  //[192][168][1][21/25]
	    $masks=explode('/', $iparr[3]);    //[21][25]
	    $iparr[3]=$masks[0];   //[192][168][1][21]
	    $mask=$masks[1];   //25
	    
	    $bitsStr='';$masksStr='';
	    for ($i = 0; $i < 4; $i++) {
	        $bitsStr=$bitsStr.chatoBit8($iparr[$i]); //循环四次后，得到一个4*8=32位的二进制ip
	    }
	    for ($i = 0; $i < $mask; $i++) {   //子网掩码前面的11111
	        $masksStr=$masksStr.'1';
	    }
	    for ($i = 0; $i < 32-$mask; $i++) {    //子网掩码后面的1111110000
	        $masksStr=$masksStr.'0';
	    }
	    
	    $bitsArr=str_split($bitsStr);  //切换成数组
	    $masksArr=str_split($masksStr);
	    
// 	    echo print_r($bitsArr);
// 	    echo '<br/>';
// 	    echo print_r($masksArr);
	    
	    for ($j = 1; $j <= 4; $j++) {   //分四个字段
	        $zwSum=0;$wlhSum=0;
	        for ($i = ($j-1)*8,$k=7; $i < $j*8; $i++,$k--) { //每8位进行比较和计算
	            if ($masksArr[$i]==1) {
	                $zwSum=$zwSum+pow(2, $k);
	                $wlhSum=$wlhSum+$bitsArr[$i]*pow(2, $k);
// 	                echo $zwSum.'@'.$i.'|';
	            }
	        }
	        $zwStr=$zwStr.$zwSum.'.';
	        $wlhStr=$wlhStr.$wlhSum.'.';
	    }
	    
	}
	
	
?>
<html>
<body>
<form action="" method="post">
    IP地址：<input type="text" id="ip" name="ip" />
    <input type="submit" value="计算" />
</form>
<div id="netmask">网络号:&nbsp; <?php echo $wlhStr ?></div>
<div id="netmask">子网码:&nbsp; <?php echo $zwStr ?></div>
</body>
</html>