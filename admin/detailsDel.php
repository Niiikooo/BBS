<?php
	include '../common.php';
	header("Location: ".$_SERVER['HTTP_REFERER']);
	var_dump($_POST);
	$id = implode(',', $_POST['id']);

	// 删除
	update($link,'bbs_details','isdel = 1',"where id in ($id)");