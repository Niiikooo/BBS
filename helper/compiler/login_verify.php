<?php

	session_start();
	include '../../common.php';
	include finder('compiler.php');

	// 判断是否登陆
	
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	// 跳转页面地址参数
	if(!isset($_SERVER['HTTP_REFERER'])){
		$refer = '/index.php';
	}else{
		$refer = $_SERVER['HTTP_REFERER'];
	}
	// 判断是否数据为空
	if(!isset($_POST['username'])){
		$login = 'emptyName.html';

		display('login_verify.html',compact('login','refer'));
		exit();
	}
	$username = $_POST['username'];

	// if($_POST['password']==NULL){
	// 	exit('密码不能为空<a href="'.$_SERVER['HTTP_REFERER'].'" >返回</a>');
		
	// }
	if (!isset($_POST['password'])) {
		$login = 'emptyPass.html';
		display('login_verify.html',compact('login','refer'));
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

	}else{
		$login = 'login_failed.html';
		unset($_SESSION);
	}

	// var_dump($_SESSION);
	// var_dump($_POST);
	// var_dump($_SERVER);
	display('login_verify.html',compact('login'));



?>