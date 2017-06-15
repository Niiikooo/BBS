<?php
	include 'common.php';
	var_dump($_SESSION);
	if (isset($_SESSION['checked']) && $_SESSION['checked'] == 1) {
		display('checkdaily_failed.html',compact('pid','breadcrumb'));
	}else{
			$uid = $_GET['uid'];
	// 加积分
	update($link,'bbs_userdata','rewardscore = rewardscore +10',"where uid =$uid");
	$_SESSION['checked'] = 1;
	display('checkdaily.html',compact('pid','breadcrumb'));
	}

