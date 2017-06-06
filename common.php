<?php

	include 'config/config.php';
		


	define('FINDER', rtrim(WEBNAME,'/').'/helper/compiler/finder.php');
	// 酱底层函数递归寻找文件放入config文件中，从而无需多次调用
	include FINDER;
	// echo WEBNAME;
	// 连接数据库
	include finder('func_mysql.php');
	$link = connect($bbs_user['host'],$bbs_user['user'],$bbs_user['pwd'],$bbs_user['charset'],$bbs_user['dbName']);
	// insert($link,$a=['a' => 'b','c' => 'd']);
	// 
	// 
	// 
	// 头部文件开始
	// include '../../common.php';
	include finder('compiler.php');
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}
	// 这个是导航条的函数
	$pid = pid($link);
// 头部文件结束
?>