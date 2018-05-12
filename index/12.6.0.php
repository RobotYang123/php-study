<html>
<OBJECT classid="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2" height="0" id="wb" name="wb" width="3"></OBJECT> 
<script language="javascript"> 
function printsetup(){
    wb.execwb(8,1); 
    } 
function printpreview(){
    wb.execwb(7,1);
    } 
function printit(){ 
    if (confirm('确定打印吗？')) { 
        wb.execwb(6,6) 
        }
    }
</script> 
<body>
<?php
	header("content-Type: text/html; charset=UTF-8");
	error_reporting(E_ALL ^ E_DEPRECATED);	
	$con=mysql_connect('localhost','abc','123456')or die('数据库连接失败！');
	echo '数据库连接成功！<br/>';
	echo '客户：'.mysql_get_client_info().'<br/>';
	echo '主机：'.mysql_get_host_info($con).'<br/>';
	echo '协议：'.mysql_get_proto_info($con).'<br/>';
	echo '服务：'.mysql_get_server_info($con).'<br/>';
	
	$gbooks=mysql_select_db('gbooks',$con);
	if ($gbooks) {
	    echo '选择数据库成功！<br/>';
	    $rs=mysql_query('select * from user');
	    if ($rs) {
	        
	        echo 'SQL查询语句发送成功！<br/>';
	        $rows=mysql_num_rows($rs);
	        echo "查询到的结果有：$rows 行。<br/>";
	        ?>
	        
	        <table width="1000" height="auto" border="1" cellpadding="1" cellspacing="0">	        
	        <?php	
	                
	        while ($arr=mysql_fetch_array($rs)) {

	            //echo 'count: '.count($arr).'<br/>';
	            //print_r($arr);
	            ?><tr><?php
	            for ($i = 0; $i < count($arr)/2; $i++) {
	                if ($arr[$i]==null||$arr==''){$arr[$i]='null';}
	                ?><td><?php
	                echo $arr[$i];
	                ?></td><?php
	            }
	            ?></tr><?php
	        }
	        ?>
	        
	        <tr>
	           <td colspan="18" align="right">
	               <a href="#" onClick="window.print();">打印订单</a> | 
	               <a href="#" onClick="printsetup();">打印设置</a> | 
	               <a href="#" onClick="printpreview();">打印预览</a>
	           </td>
	        </tr>
	        </table>
	        
	        <?php
	    }
	    
	}
	else {
	    echo '该数据库可能不存在！<br/>';
	}
	
	mysql_close($con);
?>


</body>
</html>