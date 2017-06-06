<?php
// 头文件
	include '../../common.php';
// 	include finder('compiler.php');
// 	session_start();
// // 这个是导航条的函数
// 	$pid = pid($link);
// // 判断是否登录
// 	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
// 		echo '<style>.visitor{
// 			display:none;
// 		}</style>';
// 	}else{
// 		$_SESSION['username'] = '';
// 		echo '<style>.header_right_admin{
// 			display:none;
// 		}</style>';
// 	}
// 	判断是否登录，publish为发帖按钮地址
	if (!isset($_SESSION['username'])) {
		$publish = '/helper/compiler/notlogin.php';
	}else{
		$publish = '/helper/compiler/publish.php';
	}
// 获得板块ID
	$classid = $_GET['cid'];
	// var_dump($classid);
// 根据小版块编号查询帖子数据
	$details = select($link,'*','bbs_details as a,bbs_userdata as b',"where a.classid=$classid and b.uid=a.authorid");

	// var_dump($details);

// 左侧导航栏所需数据
	$data = category($link);
//
// 所需要的数据
	



// 使用模板文件编译html文件
	display('list.html',compact('details','data','pid','publish'));