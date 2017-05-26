<?php

		// 编译函数文件库

	var_dump($_SERVER);
	// echo a;
	$aaa = 444;include '../../config/config.php';
	/**
	 * 编译函数库文件
	 * @param  地址 $tplpath 视图层文件
	 * @param  数组 $data    当前页面所需数据
	 * @return true          [description]
	 */
	function display($tplname,$data=''){
		// 合并文件具体路径
		$tplFullpath = TPL_VIEW.'$tplname';
		// 如果文件不错在跳出
		if(!file_exists($tplFullpath)){
			exit('文件出错');
		}
		// 提取文件内容 
		$content = file_get_contents($tplFullpath);
		// 编译目标文件
		$content = compile($content);
		// 存放到目标缓存路径
		// 判断是否有权限和文件夹
		// 拼接缓存文件路径
		$cache = TPL_CACHE.date('Y/m/d',time()).'/';  //目录地址
		$cacheFilepath = $cache.str_replace('.','_',$tplname).'php'; //文件地址
		echo $cacheFilepath;
		if (!file_exists($cache)){
			mkdir($cache,0777,true);

		} else{
			if(!is_readable($cache)&&!is_writable($cache)){
				exit('权限不够！');

			}
		}

		file_put_contents($cacheFilepath, $content);

		if ($data){
			extract($data);

		}
		include $cacheFilepath;

		


	}
	display('index.html');
	

	function compile(){

	}