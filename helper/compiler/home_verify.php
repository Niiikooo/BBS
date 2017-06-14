<?php
	include '../../common.php';
	header("Location: ".$_SERVER['HTTP_REFERER']);
	$realname = parseStr($_POST['realname']);
	$sex = $_POST['sex'];
	$qq = $_POST['qq'];

	// 处理生日
	$birthday = strtotime($_POST['year'].'-'.$_POST['month'].'-'.$_POST['day']);





	update($link,'bbs_userdata',"realname = $realname,sex = $sex,birthday = $birthday,qq = $qq","where uid = ".$_SESSION['uid']);