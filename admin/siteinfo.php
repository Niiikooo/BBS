<?php
	include '../common.php';
	header("Location: ".$_SERVER['HTTP_REFERER']);
	// 获取首页文件内容
	$data = file_get_contents(finder('index.php'));
	$data1 = file_get_contents(finder('adminIndex.php'));
	// var_dump($data);
	var_dump($_POST);

	

	// 获取修改过的站点信息，为post过来的
	$site['siteName'] = $_POST['siteName'];
	$site['webName'] = $_POST['webName'];
	$site['url'] = $_POST['url'];
	$site['info'] = $_POST['info'];
	$site['siteStatus'] = $_POST['siteStatus'];

// 修改站点信息
// 将index.php的文件信息提取出来使用正则替换站点信息
	foreach ($site as $key => $value) {
		$replace = "'$key' => '$value'";

		$pattern = '#'."\'$key\' \=\> "."(\'.+\')".'#imsU';
		var_dump($pattern);
		$data = preg_replace($pattern, $replace, $data);
		$data1 = preg_replace($pattern, $replace, $data1);
		// var_dump(preg_match($pattern, '$site['."'webName'"."]"));
	}
	
	file_put_contents(finder('index.php'), $data);
	file_put_contents(finder('adminIndex.php'), $data1);
