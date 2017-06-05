<?php
	// 数据库链接所需的参数
	$bbs_user = ['host'=>'localhost' , 'user'=> 'root' , 'pwd' => '' , 'charset' => 'utf8' , 'dbName' => 'bbs' , 'prefix' => 'bbs_'];

	// 网站所需常量
	define('WEBNAME', $_SERVER['DOCUMENT_ROOT']);
	define('TPL_VIEW', rtrim(WEBNAME,'/').'/views');
	define('TPL_CACHE', rtrim(WEBNAME,'/').'/caches');
	// define('TPL_IMAGE', rtrim(WEBNAME,'/').'/public/img');
	
	define('TPL_IMG', '/public/img/');
	define('TPL_PHP', '/helper/compiler/');

	





	
