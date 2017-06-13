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
	var_dump($_SESSION);
	$regtime = time();
	$regip = ip2long($_SERVER['REMOTE_ADDR']);
	// var_dump(preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',$email));
	// var_dump(strlen($username)>10,preg_match('/^(\d)*$/', $pwd),strlen($pwd)<6 || strlen($pwd)>20,preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',$email),$qd != $_SESSION['qd']);
	// 
	// 判断用户名有没有被注册
	if ($a = select($link,'username','bbs_userdata',"where username = '$username'")) {
		$verify = 'reg_usedname.html';
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		exit();
	}
	// 
	// 验证用户名和密码的格式是否正确
	if(strlen($username)>10){
		$verify = 'reg_failed.html';
		var_dump('asdf');
		display('register_verify.html',compact('pid','breadcrumb','verify'));
var_dump($_POST);
		exit();
	}elseif(preg_match('/^(\d)*$/', $pwd)){
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
	}elseif($qd != $_SESSION['qd']){
		$verify = 'reg_failed.html';
		// 判断验证码是否正确
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		exit();
	}
	var_dump($_POST);
	// 判断两次密码是否输入正确
	if ($pwd != $repwd) {
		$verify = 'reg_failed.html';
		display('register_verify.html',compact('pid','breadcrumb','verify'));
		var_dump($_POST);
		exit();
	}


		
	$data=['username' => $username,'password' => $pwd,'email' => $email,'regtime' => $regtime,'lasttime' => $regtime,'regip' => $regip];

	$insert = insert($link,'bbs_userdata',$data);
	if($insert){

		$verify = 'reg_success.html';
		// 存入session需要的数据
		var_dump($username);
		$User = select($link,'*','bbs_userdata',"where username = '$username'");
		var_dump($User);
		$_SESSION['username'] = $username;
		$_SESSION['rewardscore'] = $User[0]['rewardscore'];
		$_SESSION['group'] = $User[0]['group'];
		$_SESSION['picture'] = $User[0]['picture'];
		$_SESSION['uid'] = $User[0]['uid'];
		$_SESSION['power'] = $User[0]['power'];

	}else{
		$verify = 'reg_failed.html';
		echo '注册失败！请重新注册！<a href="index.php">返回</a>';
	}
	// var_dump($verify);
	display('register_verify.html',compact('pid','breadcrumb','verify'));

?>		