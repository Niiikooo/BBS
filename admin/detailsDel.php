<?php
	include '../common.php';
	var_dump($_POST);
	$id = implode(',', $_POST['id']);

	// 删除
	update($link,'bbs_details','isdel = 1',"where id in ($id)");