<?php
	include '../../common.php';

	if (!isset($_SESSION['username'])) {
		
	}
	var_dump($_POST);
	$addtime = time();
	// insert()

// 如果加入未成功显示失败消息
	// if (condition) {
	// 	$publish_verify = 'publish_error.html';
	// }
	
// 如果插入成功显示成功消息
	// if (condition) {
	// 	$publish_verify = 'publish_success.html';
	// }
	
// 
	var_dump($_SESSION);

// 编译
	display('publish_verify.html',compact('pid','publish_verify'));


	
