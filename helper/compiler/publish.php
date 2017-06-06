<?php
// // 头部文件开始
	include '../../common.php';
// 	include finder('compiler.php');
// 	session_start();
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
// 	// 这个是导航条的函数
// 	$pid = pid($link);
// // 头部文件结束




// 编译
	display('publish.html',compact('pid'));