<?php
	include '../common.php';
	// var_dump($_POST);
	header("Location:".$_SERVER['HTTP_REFERER']);
	// id拼接为字符串
	$id = implode(',', $_POST['id']);
	var_dump($id);
	// 判断为恢复还是删除
	if (isset($_POST['recover'])) {
		echo update($link,'bbs_details','isdel = 0',"where id in ($id)");
	}else{
		echo delete($link,'bbs_details',"where id in ($id)");
	}