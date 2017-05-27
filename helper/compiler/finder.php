<?php

// 递归寻找文件
// 
	$docu_root = $_SERVER['DOCUMENT_ROOT'];
	var_dump(finder('index.html',$docu_root));

	function finder($path,$document_root,$sum=0,$sum2=0){
		var_dump($document_root,'<br>');
		echo $sum = $sum +1;

		// 判断文件是否在根目录下
		$newPath = rtrim($document_root,'/').'/'.$path;
		var_dump($newPath);
		if(file_exists($newPath)){
			var_dump($newPath);
			return $newPath;
		}

		// 如果文件不存在根目录下
		// 
	

		$dir = opendir($document_root);
		echo readdir($dir);
		echo readdir($dir);
		while ($read = readdir($dir)) {
			echo $sum2 = $sum2 +1;
			echo $read,'<br>';

		$newDir = rtrim($document_root,'/').'/'.$read;
		if($read == $path){
			return $newDir;
		}

		if(is_dir($newDir)){
			return finder($path,$newDir);

		}
		}

		closedir($dir);
		

			
	}
