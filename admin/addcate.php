<?php
	include '../common.php';
	$data = select($link,'classname','bbs_category','where parentid = 0');
	// var_dump($data);

	display('addcate.html',compact('data'));