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
	try{
		xmlHttp.open("GET","ajax3Data.xml",true);
		xmlHttp.onreadystatechange=handleStateChange;
		xmlHttp.send(null);
	}catch(e){
		alert("您要访问的资源不存在！");
	}		
}

function handleStateChange()
{
	if(xmlHttp.readyState==4)
	{
		if(xmlHttp.status==200 || xmlHttp.status==0)
		{
			var xmlDOM = xmlHttp.responseXML;    //取得XML的 DOM 对象
			var root = xmlDOM.documentElement;   //取得XML的根
			try{
				var info = root.getElementsByTagName('info');      //取得 <info> 结果
				alert("XML文件信息为：" + info[0].firstChild.data); //显示返回结果
			}catch(e){
				e.printStackTrace();				
			}
		}
	}
}


</script>

<html>
<body>
    <form action="#">
        <input type="button" value="返回XML文件数据" onClick="startRequest();" />
    </form>
</body>
</html>


<?php
	header("content-Type: text/html; charset=UTF-8");
		
?>