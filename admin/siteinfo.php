<?php
	include '../common.php';

	// 获取首页文件内容
	$data = file_get_contents(finder('index.php'));
	var_dump($data);

	

	// 获取修改过的站点信息，为post过来的
	$site['siteName'] = $_POST['siteName'];
	$site['webName'] = $_POST['webName'];
	$site['url'] = $_POST['url'];
	$site['info'] = $_POST['info'];

// 修改站点信息
// 将index.php的文件信息提取出来使用正则替换站点信息
	foreach ($site as $key => $value) {
		$replace = "'$key'  => '$value'";
		$pattern = '#'."\'$key\' \=\> "."(\'.+\')".'#imsU';
		$data = preg_replace($pattern, $replace, $data);
	}
	
	file_put_contents(finder('index.php'), $data);
