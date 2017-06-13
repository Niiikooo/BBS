<?php
	include '../common.php';
	var_dump($_POST);
	if (!isset($_POST['id'])) {
		exit();
	}
	$id = implode(',', $_POST['id']);

	// 删除
	update($link,'bbs_details','isdel = 1',"where id in ($id)");