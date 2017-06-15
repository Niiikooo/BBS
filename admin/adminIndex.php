<?php
	include '../common.php';

	$data = file_get_contents(finder('index.php'));
	// var_dump($data);
	


	$site = ['siteName' => '酒吧','webName' => '我的论坛','url' => 'www.ok.com','info' => '京ICP备 89273号'];

	display('adminIndex.html',compact('site'));