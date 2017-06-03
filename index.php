<?php

	
	include 'common.php';
	include finder('compiler.php');
	session_start();
	$username = $_SESSION['username'] = '';
	if($_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}
	// 检验文件地址
	$login = 'helper/compiler/login_verify.php';
	// 将所有的帖子数据提取出来，是一个三维数组
	$data = category($link);
	// 将大板块的数据提取出来，是一个一维数组
	$bigid = select($link,'cid,classname','bbs_category','where parentid=0');
	var_dump($bigid);
	foreach ($bigid as $key => $value) {
		$pid[$value['cid']] = $value['classname'];
	}
	var_dump($pid);
	// 使用模板文件编译
  	display('index.html',$data = compact($_SESSION['username'],'login','data','pid'));

	// 将版块数据提起出来，从表bbs_category

	
	

	















?>