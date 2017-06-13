<?php
	include '../common.php';

	$userdata = select($link,'*','bbs_userdata','where allowlogin in (0,-1,1)');
	var_dump($userdata);
	foreach ($userdata as $key => $value) {
		// 处理时间
		$time = date('Y-m-d H:i:s',$value['regtime']);
		$userdata[$key]['regtime'] = $time;
		// 处理是否锁定
		$allowlogin = $value['allowlogin'];
		if ($allowlogin == 0 || $allowlogin == 1) {
			// 没有被锁定是
			$userdata[$key]['allowlogin'] = '锁定用户';
		}else{
			// 被锁定时
			$userdata[$key]['allowlogin'] = '解锁用户';
		}
	}
	var_dump($userdata);
	display('userManage.html',compact('userdata'));