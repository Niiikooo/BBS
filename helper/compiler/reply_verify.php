<?php

	include '../../common.php';
	var_dump($_SESSION);
	if (!isset($_SESSION['username'])) {
		display('notlogin.html',compact('pid','breadcrumb'));
		exit();
	}
	var_dump($_POST);
	// 获得所有所需的帖子数据
	$tid = $_POST['tid'];
	if (!isset($_POST['content'])){
		$verify = 'reply_failed.html';
	}else{
		$content = $_POST['content'];
	}
	
	$first = 0;
	$authorid = $_SESSION['uid'];
	$addtime = time();
	$addip = $_SERVER['REMOTE_ADDR'];
	if ($addip=='::1') {
		$addip == '127.0.0.1';
	}
	$addip = ip2long($addip);
	list($classid,$value) = each($breadcrumb['classname']);
	// 压缩变量
	$data = compact('tid','content','first','authorid','addtime','addip','classid');

	// 插入数据库，返回是否插入值
	$a = insert($link,'bbs_details',$data);
	if ($a) {
		$verify = 'reply_success.html';
	}else{
		$verify = 'reply_failed.html';
	}
	unset($a);
	display('reply_verify.html',compact('pid','breadcrumb','verify'));
