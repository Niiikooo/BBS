<?php
	include '../common.php';
	$data = category($link,0,2);
	// var_dump($data);

	$details = select($link,'*','bbs_details','where first = 1');
	var_dump($details);
	display('detailsManage.html',compact('pid','breadcrumb','details'));
