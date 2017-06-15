<?php
	include '../../common.php';

	if (!isset($_SESSION['username'])) {
		
	}
	// var_dump($_POST,$_SESSION);
	// 传入变量
	$tid = 0;
	if (!isset($_POST['content']) || !isset($_POST['title']) ||$_POST['content'] == null || $_POST['title'] == null ) {
		$publish_check = 'publish_error.html';
	}else{
		$content = $_POST['content'];
	}
	// var_dump($_POST);
	
	$first = 1;
	$title = $_POST['title'];
	$authorid = $_SESSION['uid'];
	$addtime = time();
	$addip = $_SERVER['REMOTE_ADDR'];
	if ($addip=='::1') {
		$addip = '127.0.0.1';
	}
	$addip = ip2long($addip);
	$classid = $_GET['cid'];
	$rate = $_POST['price'];
	$data = compact('tid','content','first','authorid','addtime','addip','classid','title','rate');
	if ($_SESSION['qd'] != $_POST['qd']) {
		$publish_check = 'publish_error.html';
	}else{
	// 插入数据库，返回是否插入值
	$a = insert($link,'bbs_details',$data);
	// var_dump($a);
	if ($a) {
		// 发帖积分增加
		update($link,'bbs_userdata','rewardscore=rewardscore +10',"where uid = ".$authorid);
		$publish_check = 'publish_success.html';
	}else{
		$publish_check = 'publish_error.html';
	}
}

// 如果加入未成功显示失败消息
	// if (condition) {
	// 	$publish_verify = 'publish_error.html';
	// }
	
// 如果插入成功显示成功消息
	// if (condition) {
	// 	$publish_verify = 'publish_success.html';
	// }
	
	// var_dump($breadcrumb);
	// var_dump($_SESSION);
	$tid = select($link,'id','bbs_details',"",'','order by addtime desc','limit 0,1');
	$tid = $tid[0]['id'];

// 编译
	display('publish_verify.html',compact('pid','breadcrumb','publish_check','tid'));


	
