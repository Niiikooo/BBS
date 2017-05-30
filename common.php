<?php

	include 'config/config.php';
	include finder('func_mysql.php');
	// 连接数据库
	$link = connect($bbs_user['host'],$bbs_user['user'],$bbs_user['pwd'],$bbs_user['charset'],$bbs_user['dbName']);
	// insert($link,$a=['a' => 'b','c' => 'd']);
?>