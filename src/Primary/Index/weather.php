<?php
	header("content-Type: text/html; charset=UTF-8");
    /*
    * 指定WebService路径并初始化一个WebService客户端
    */
    $ws = "http://www.webservicex.net/globalweather.asmx?wsdl";//webservice服务的地址
    
    $client = new SoapClient ($ws);
    /*
    * 获取SoapClient对象引用的服务所提供的所有方法
    */
    echo ("SOAP服务器提供的开放函数:");
    echo ('<pre>');
    var_dump ( $client->__getFunctions () );//获取服务器上提供的方法
    echo ('</pre>');
    echo ("SOAP服务器提供的Type:");
    echo ('<pre>');
    var_dump ( $client->__getTypes () );//获取服务器上数据类型
    echo ('</pre>');
    echo ("执行GetGUIDNode的结果:");
    $result=$client->getWeather(array('CityName'=>'zhengzhou','CountryName'=>'china'));//查询中国郑州的天气，返回的是一个结构体
    echo $result->GetWeatherResult;//显示结果
?>