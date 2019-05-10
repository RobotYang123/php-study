<script type="text/javascript">
var xmlHttp=false;										//用来检测是否为合法的IE实例

/* 创建 XMLHttpRequest 对象实例 方法1 */
function createXMLRequest()
{
	if(window.XMLHttpRequest)							//如果使用的是非IE浏览器
	{
		xmlHttp=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)						//如果使用的是IE浏览器
	{
		try{
			xmlHttp=new ActiveXObject("MSxml2.XMLHTTP");		//如果JavaScript的版本大于5
		}catch(e){
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");	//如果使用的是IE浏览器
			}catch(e2){
				xmlHttp=false;
			}
		}
	}
}


function startRequest()
{
	createXMLRequest();
	var username=document.getElementById("username").value;
	//alert(username);
	var url="ajax2Server.php?username=" + username;
	xmlHttp.open("GET",url,true);
	xmlHttp.onreadystatechange=handleStateChange;
	xmlHttp.send(null);
}

function handleStateChange()
{
	if(xmlHttp.readyState==4)
	{
		if(xmlHttp.status==200)
		{
			 document.getElementById("show").innerHTML = "服务器响应信息为：" + xmlHttp.responseText;
		}
	}
}


</script>

<html>
<body>
    <form action="#">
                        用户名：<input type="text" id="username" onKeyUp="startRequest();" />&nbsp;
        <span id="show"></span>
    </form>
</body>
</html>


<?php
	header("content-Type: text/html; charset=UTF-8");
		
?>