<?php

// 递归寻找文件
// 
	// define('WEBNAME', $_SERVER['DOCUMENT_ROOT']);
	function find($path,$document_root=WEBNAME,$sum=0,$sum2=0){

	// echo $document_root;
	// echo $_SERVER['DOCUMENT_ROOT'].'<br>';
		// var_dump($document_root,'<br>');
		// echo $sum = $sum +1;

		// 判断文件是否在根目录下
		// echo $_SERVER['DOCUMENT_ROOT'];
		$newPath = rtrim($document_root,'/').'/'.$path;
		if(file_exists($newPath)){
			// var_dump($newPath);
			$a = '';
			global $a;
			$a = $newPath;
			return $a;
		}

		// 如果文件不存在根目录下
		// 
	

		$dir = opendir($document_root);
		readdir($dir);
		readdir($dir);
		while ($read = readdir($dir)) {
			// echo $sum2 = $sum2 +1;
			// echo $read,'<br>';

		$newDir = rtrim($document_root,'/').'/'.$read;
		if($read == $path){
			return $newDir;
		}

		if(is_dir($newDir)){
			find($path,$newDir);
			// var_dump($newPath);

		}
		}

		closedir($dir);
			
	}

	function finder($path){
		find($path);
		global $a;
		
		if($a==''){
			exit('引入的文件不存在');

		}
		return $a;
	}
