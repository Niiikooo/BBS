<?php
	include '../common.php';

	$data = file_get_contents(finder('index.php'));
	var_dump($data);
	


	$site = ['siteName' => '论坛','webName' => '你的论坛','url' => 'www.rain.com','info' => '京ICP备 89273号'];

	display('adminIndex.html',compact('site'));