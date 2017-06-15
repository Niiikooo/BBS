<?php
	include '../common.php';
	// var_dump($_POST);

	header("Location:".$_SERVER['HTTP_REFERER']);

	$ip = $_POST['ip'];
	$ip = ip2long($ip);
	$addtime = time();
	$data = compact('ip','addtime');
	// var_dump($data);
	insert($link,'bbs_closeip',$data);