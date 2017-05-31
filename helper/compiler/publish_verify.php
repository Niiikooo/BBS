<?php
	session_start();
	include '../../common.php';
	$title = $_POST['title'];
	$text = $_POST['text'];
	$gold = $_POST['gold'];

	// 在session里面放入uid
	// 
	$uid = $_SESSION['uid'];
	// cid从url里面拿
	echo $cid = $_GET['cid'];

	$regtime = $lasttime = time();
