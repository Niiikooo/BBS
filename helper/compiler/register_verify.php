<?php
	include '../../common.php';
	session_start();	
	// 获取回复信息
	$username = $_POST['username'];
	$pwd = $_POST['password'];
	$repwd = $_POST['password'];
	$email = $_POST['email'];
	$qq = $_POST['qq'];
	$verify = $_POST['verify'];
	echo $regtime = $_POST['regtime'];
	$regip = strval(ip2long($_SERVER['REMOTE_ADDR']));
	echo '<br>',$regip;



		
	$data=['username' => $username,'password' => $pwd,'email' => $email,'qq' => $qq,'regtime' => $regtime,'lasttime' => $regtime,'regip' => $regip];

	$insert = insert($link,'bbs_userdata',$data);
	if($insert){
		echo '注册成功！<a href="index.php">返回</a>';
		$_SESSION['username'] = $username;
	}else{
		echo '注册失败！请重新注册！<a href="index.php">返回</a>';
	}
	

?>		