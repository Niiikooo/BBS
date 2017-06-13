<?php

	include '../../common.php';
	var_dump($_GET);
	// 判断闯过来的是什么值，进行置顶等动作
	if (isset($_GET['del'])) {
		// 删除主题
		update($link,'bbs_details','isdel = 1',"where id = ".$_GET['del']);
	}elseif (isset($_GET['elite'])) {
		// 精华帖
		update($link,'bbs_details','elite = 1',"where id = ".$_GET['elite']);
	}elseif(isset($_GET['istop'])){
		// 置顶
		update($link,'bbs_details','istop = 1',"where id = ".$_GET['istop']);
	}elseif(isset($_GET['pay'])){
		// 如果没登录跳转到登录界面

		if (!isset($_SESSION['uid'])) {
			display('notlogin.html',compact('pid','breadcrumb'));
		exit();
		}else{
			// 登陆成功的时候
			$tid = $_GET['pay'];
			// 检查余额是否足够
			
			$money = select($link,'gold','bbs_userdata',"where uid = ".$_SESSION['uid']);
			$money = $money[0]['gold'];
			var_dump($money);
			if ($money>$_GET['rate']) {
				// 酱购买插入order表
				insert($link,'bbs_order'," set uid = ".$_SESSION['uid'].", tid = ".$_GET['pay'].", rate = ".$_GET['rate'].", addtime = ".time());
				// 更新用户所剩的金币 
				update($link,'bbs_userdata',"gold = gold - 10","where uid = ".$_SESSION['uid']);
			}
			
			
		}
		

	}
	