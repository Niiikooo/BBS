<?php
	session_start();
	include 'common.php';
	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$pwd_database = select_user($link,$username){
		if($pwd_database==null){
			// 插入登陆失败的提示
			
		}else if($pwd_database == $pwd){
			// 插入登陆成功的提示,并且存入session
			// session操作
			$_SESSION['username'] = $username;
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="5; url=../index.php">
</head>
<body>
	
</body>
</html>