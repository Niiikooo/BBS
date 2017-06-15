<?php

	include '../../common.php';
	// var_dump($_POST);
	header("Location: ".$_SERVER['HTTP_REFERER']);
	$autograph = $_POST['autograph'];
	update($link,'bbs_userdata',"autograph = '$autograph'","where uid = ".$_SESSION['uid']);