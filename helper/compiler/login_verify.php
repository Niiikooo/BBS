<?php

	session_start();
	include '../../common.php';
	include finder('compiler.php');

	// 判断是否登陆
	
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	
	// 判断是否数据为空
	if(!isset($_POST['username'])){
		exit('用户名不能为空<a href="'.$_SERVER['HTTP_REFERER'].'" >返回</a>');
	}
	$username = $_POST['username'];

	// if($_POST['password']==NULL){
	// 	exit('密码不能为空<a href="'.$_SERVER['HTTP_REFERER'].'" >返回</a>');
		
	// }
	$pwd = $_POST['password'];

	// 提取数据
	$pwd_database = select_user($link,$username);
	if($pwd_database == $pwd){
		// 插入登陆成功的提示,并且存入session
		$login = 'login_success.html';
		// session操作
		$_SESSION['username'] = $username;
	}else{
		$login = 'login_failed.html';
		// unset($_SESSION['username']);
	}

	// var_dump($_SESSION);
	// var_dump($_POST);
	// var_dump($_SERVER);
	display('login_verify.html',compact('login'));



?>