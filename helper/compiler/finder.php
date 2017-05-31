<?php

// 递归寻找文件
	function find($path,$document_root=WEBNAME,$sum=0,$sum2=0){



		// 判断文件是否在根目录下
		$newPath = rtrim($document_root,'/').'/'.$path;
		if(file_exists($newPath)){
			// var_dump($newPath);
			$a = '';
			global $a;
			$a = $newPath;
			return $a;
		}

		// 如果文件不存在根目录下
		$dir = opendir($document_root);
		readdir($dir);
		readdir($dir);
		while ($read = readdir($dir)) {

		$newDir = rtrim($document_root,'/').'/'.$read;
		if($read == $path){
			return $newDir;
		}

		if(is_dir($newDir)){
			find($path,$newDir);

		}
		}

		closedir($dir);
			
	}
	// 将find函数输出
	function finder($path){
		find($path);
		global $a;
		
		if($a==''){
			exit('引入的文件不存在');
		}
		return $a;
	}
