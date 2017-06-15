<?php

	include '../common.php';

	var_dump($_POST);
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$allowlogin = $_POST['status'];
	$power = $_POST['power'];
	@$problem = $_POST['ques'];
	$autograph = $_POST['qianming'];
	$sex = $_POST['sex'];
	$realname = $_POST['name'];
	$rewardscore = $_POST['integray'];
	$birthday = strtotime($_POST['year'].'/'.$_POST['month'].'/'.$_POST['day']);
	var_dump($birthday);

	if ($power == -1) {
		$group = '管理员';
	}elseif ($power == 0) {
		$group = '普通用户';
	}
	if ($password == null) {
		exit();
	}
	update($link,'bbs_userdata',"username = '$username',password='$password',email='$email',allowlogin=$allowlogin,power=$power,autograph='$autograph',sex=$sex,realname='$realname',rewardscore=$rewardscore,birthday=$birthday,groupName = '$group'","where uid = ".$_POST['uid']);