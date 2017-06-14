<?php
	include '../../common.php';

	// 提取用户信息
	
	$userdata = select($link,'*','bbs_userdata',"where uid = ".$_SESSION['uid']);
	$userdata = $userdata[0];
	var_dump($userdata);


	display('home.html',compact('pid','breadcrumb','userdata'));