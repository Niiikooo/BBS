<?php
	include '../../common.php';
	$autograph = select($link,'autograph','bbs_user',"where uid = ".$_SESSION['uid']);
	$autograph = $autograph[0]['autograph'];
	var_dump($autograph);
	display('home_qm.html',compact('pid','breadcrumb','autograph'));