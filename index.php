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
	$data = category($link);
	$bigid = select($link,'cid,classname','bbs_category','where parentid=0');
	var_dump($bigid);
  	display('index.html',$data = compact($_SESSION['username'],'login','data','bigid'));

	// 将版块数据提起出来，从表bbs_category

	
	

	















?>