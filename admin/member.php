<?php

	include '../common.php';

	$userdata = select($link,'*','bbs_userdata',"where uid = ".$_GET['uid']);
	$userdata = $userdata[0];
	var_dump($userdata);
	display('member.html',compact('userdata'));