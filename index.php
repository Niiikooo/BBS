<?php

	
	include 'common.php';
	include finder('compiler.php');
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}
	var_dump($_SESSION);
	// 检验文件地址
	$login = 'helper/compiler/login_verify.php';
	// 将所有的帖子数据提取出来，是一个三维数组,同时限定是否有板块编号，如果有提取的时候只提取固定板块
	$cid = 0;
	if(isset($_GET['cid']) && $_GET['cid']>0){
		$cid = $_GET['cid'];
	}
	$data = category($link,$cid);
	// 将大板块的数据提取出来，是一个一维数组
	$pid = pid($link);
	// 使用模板文件编译
  	display('index.html',$data = compact($_SESSION['username'],'login','data','pid'));

	// 将版块数据提起出来，从表bbs_category

	
	

	















?>