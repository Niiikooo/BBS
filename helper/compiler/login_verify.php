<?php

	include '../../common.php';
	// include finder('compiler.php');

	// 判断是否登陆
	
		// echo '<style>.header_right_admin{
		// 	display:none;
		// }</style>';
		// 
	// 跳转页面地址参数
	if(!isset($_SERVER['HTTP_REFERER'])){
		$refer = '/index.php';
	}else{
		$refer = $_SERVER['HTTP_REFERER'];
	}
	// 判断是否用户名为空
	if(empty($_POST['username'])){
		$login = 'emptyName.html';

		display('login_verify.html',compact('login','refer','pid'));
		exit();
	}
	$username = $_POST['username'];

	// if($_POST['password']==NULL){
	// 	exit('密码不能为空<a href="'.$_SERVER['HTTP_REFERER'].'" >返回</a>');
		
	// }
	if (empty($_POST['password'])) {
		$login = 'emptyPass.html';
		display('login_verify.html',compact('login','refer','pid'));
		exit();

	}

	$pwd = $_POST['password'];

	// 提取数据,是一个包含用户信息的数组，包括积分用户组
	$pwd_database = select_user($link,$username);

	if($pwd_database['password'] == $pwd){
		// 插入登陆成功的提示,并且存入session
		$login = 'login_success.html';
		// session操作
		$_SESSION['username'] = $username;
		$_SESSION['rewardscore'] = $pwd_database['rewardscore'];
		$_SESSION['group'] = $pwd_database['group'];
		$_SESSION['picture'] = $pwd_database['picture'];
		$_SESSION['uid'] = $pwd_database['uid'];

	}else{
		$login = 'login_failed.html';
		array_splice($_SESSION, 0);
	}

	// var_dump($_SESSION);
	// var_dump($_POST);
	// var_dump($_SERVER);
	display('login_verify.html',compact('login','pid','refer','breadcrumb'));



?>