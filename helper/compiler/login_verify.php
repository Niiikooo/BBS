<?php

	session_start();
	include '../../common.php';
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	$pwd_database = select_user($link,$username);
	
	if($pwd_database == $pwd){
		// 插入登陆成功的提示,并且存入session
		echo '登陆成功！';
		// session操作
		$_SESSION['username'] = $username;
	}else{
		echo '登陆失败';
	}
?>