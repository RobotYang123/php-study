// JavaScript Document

var xmlHttp=false;										//用来检测是否为合法的IE实例

/* 创建 XMLHttpRequest 对象实例 方法1 */
function createXMLRequest1()
{
	if(window.XMLHttpRequest)							//如果使用的是非IE浏览器
	{
		xmlHttp=new XMLhttpRequest();
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

/* 创建 XMLHttpRequest 对象实例 方法2 */
function createXMLRequest2()
{
	try{													//检测是否使用的是IE
		xmlHttp=new ActiveXObject("MSxml2.XMLHTTP");		//如果JavaScript的版本大于5
	}catch(e){												//如果不是，则使用老版本的ActiveX对象
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");	//如果使用的是IE浏览器
		}catch(e2){
			e2.printStackTrace();
		}
	}
	/****************** 如果使用的是非IE浏览器，则创建一个该对象的JavaScript实例 ******************/
	if(!xmlHttp && typeof XMLHttpRequest !="undefined")
	{
		try{
			xmlHttp=new XMLhttpRequest();
		}catch(e3){
			xmlHttp=false;
		}
	}	
}



