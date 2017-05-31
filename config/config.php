<?php
	// 数据库链接所需的参数
	$bbs_user = ['host'=>'localhost' , 'user'=> 'root' , 'pwd' => '' , 'charset' => 'utf8' , 'dbName' => 'bbs' , 'prefix' => 'bbs_'];

	// 网站所需常量
	define('WEBNAME', $_SERVER['DOCUMENT_ROOT']);
	define('TPL_VIEW', rtrim(WEBNAME,'/').'/views');
	define('TPL_CACHE', rtrim(WEBNAME,'/').'/caches');
	define('FINDER', rtrim(WEBNAME,'/').'/helper/compiler/finder.php');

	// 酱底层函数递归寻找文件放入config文件中，从而无需多次调用
	include FINDER;

	





	
