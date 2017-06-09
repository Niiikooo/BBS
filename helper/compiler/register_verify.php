<?php
	include '../../common.php';
	// session_start();	
	// 获取回复信息
	// 如果值为空则返回重新输入
	
	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['repassword']) ||empty($_POST['email']) || empty($_POST['verify'])) {
		$verify = 'reg_failed.html';
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		exit();
	}
	var_dump($_POST);
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	$repwd = $_POST['password'];
	$email = $_POST['email'];
	$qd = $_POST['verify'];
	$regtime = time();
	$regip = ip2long($_SERVER['REMOTE_ADDR']);
	var_dump(strlen($username)>10,!preg_match('/^(\d)*$/', $pwd),strlen($pwd)<6 || strlen($pwd)>20,!preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', $email));
	// 验证用户名和密码的格式是否正确
	if(strlen($username)>10){
		$verify = 'reg_failed.html';
		display('register_verify.html',compact('pid','breadcrumb','verify'));
var_dump($_POST);
		exit();
	}elseif(!preg_match('/^(\d)*$/', $pwd)){
		$verify = 'reg_failed.html';
		// 判断密码是否为纯数字
		display('register_verify.html',compact('pid','breadcrumb','verify'));
var_dump($_POST);
		exit();
	}elseif (strlen($pwd)<6 || strlen($pwd)>20) {
		$verify = 'reg_failed.html';
		// 判断密码长度
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		var_dump($_POST);
		exit();
		
	}elseif (!preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', $email)) {
		$verify = 'reg_failed.html';
		// 判断邮箱格式
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		exit();
	}

	var_dump($_POST);
	// 判断两次密码是否输入正确
	if ($pwd != $repwd) {
		echo 234234234234;
		$verify = 'reg_failed.html';
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		var_dump($_POST);
		exit();
	}


		
	$data=['username' => $username,'password' => $pwd,'email' => $email,'regtime' => $regtime,'lasttime' => $regtime,'regip' => $regip];

	$insert = insert($link,'bbs_userdata',$data);
	if($insert){
		$verify = 'reg_success.html';
		echo '注册成功！<a href="index.php">返回</a>';
		$_SESSION['group'] = '普通用户';
		$_SESSION['rewardscore'] = 0;
		$_SESSION['username'] = $username;
		$_SESSION['picture'] = '/public/img/logo.jpg';

	}else{
		$verify = 'reg_failed.html';
		echo '注册失败！请重新注册！<a href="index.php">返回</a>';
	}
	var_dump($verify);
	display('register_verify.html',compact('pid','breadcrumb','verify'));

?>		