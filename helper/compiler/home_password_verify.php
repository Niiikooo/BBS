<?php
	include '../../common.php';
	header("Location: ".$_SERVER['HTTP_REFERER']);
	var_dump($_POST);

	// password
	$password = select($link,'password,problem,result','bbs_userdata','where uid = '.$_SESSION['uid']);
	$password = $password[0]['password'];
	$question = $password[0]['problem'];
	$answer = $password[0]['result'];

	var_dump($password);


	$oldpass = md5($_POST['oldpas']);
	$newpass = md5($_POST['newpas']);
	$renewpass = md5($_POST['renewpas']);
	$email = $_POST['email'];
	$ques = $_POST['question'];
	$ans = $_POST['answer'];

	// 验证是否密码一致
	if ($renewpass != $newpass || $oldpass != $password ) {
		display('pass_failed.html',compact('pid','breadcrumb'));
		exit();
	}else{
		update($link,'bbs_userdata',"password = '$newpass',email = '$email',problem = '$ques',result = '$ans'","where uid = ".$_SESSION['uid']);
	}

