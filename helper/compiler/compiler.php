
<?php

		// 编译函数文件库
	// var_dump(file_exists('index.html'));
	// var_dump(file_exists('www.rain.com/views/index.html'));
	// var_dump($_SERVER['DOCUMENT_ROOT']);
	// include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	// var_dump($_SERVER['DOCUMENT_ROOT']);
	/**
	 * 编译函数库文件
	 * @param  地址 $tplpath 视图层文件
	 * @param  数组 $data    当前页面所需数据
	 * @return true          [description]
	 */
	function display($tplname,$data=''){
		// 合并文件具体路径
		$tplFullpath = finder($tplname);
		// echo $tplFullpath;
		// 如果文件不错在跳出
		// var_dump(file_exists($tplFullpath));
		if(!file_exists($tplFullpath)){
			exit('文件出错');
		}
		// 提取文件内容 
		// $content = file_get_contents($tplFullpath);
		// 编译目标文件
		$content = compile($tplFullpath);
		// 存放到目标缓存路径
		// 判断是否有权限和文件夹
		// 拼接缓存文件路径
		$cache = rtrim(TPL_CACHE,'/').'/'.date('Y/m/d',time()).'/';  //目录地址
		$cacheFilepath = $cache.str_replace('.','_',$tplname).'.php'; //文件地址
		// echo $cacheFilepath;
		if (!file_exists($cache)){
			mkdir($cache,0777,true);

		} else{
			if(!is_readable($cache)&&!is_writable($cache)){
				exit('权限不够！');

			}
		}

		file_put_contents($cacheFilepath, $content);
		// var_dump($data);
		if (is_array($data)){
			extract($data);

		}
		include $cacheFilepath;


		


	}
	// display('index.html');
	

	function compile($path)
{
	//把模板文件里面的内容拿出来
	$file = file_get_contents($path);
	//规则
	$keys = [
		'{$%%}' 			=> '<?=$\1;?>',
		'{if %%}' 			=> '<?php if(\1):?>',
		'{/if}'				=> '<?php endif;?>',
		'{else}'			=> '<?php else: ?>',
		'{elseif %%}'   	=> '<?php elseif(\1):?>',
		'{else if %%}'  	=> '<?php elseif(\1):?>',
		'{foreach %%}'		=> '<?php foreach(\1):?>',
		'{/foreach}'		=> '<?php endforeach;?>',
		'{while %%}'		=> '<?php while(\1):?>',
		'{/while}'			=> '<?php endwhile;?>',
		'{for %%}'			=> '<?php for(\1):?>',
		'{/for}'			=> '<?php endfor;?>',
		'{continue}'		=> '<?php continue;?>',
		'{break}'			=> '<?php break;?>',
		'{$%%++}'			=> '<?php $\1++;?>',
		'{$%%--}'			=> '<?php $\1--;?>',
		'{/*}'				=> '<?php /*',
		'{*/}'				=> '*/?>',
		'{section}'			=> '<?php ',
		'{/section}'		=> '?>',
		'{$%% = $%%}'		=> '<?php $\1 = $\2;?>',
		'{default}'			=> '<?php default:?>',
		'{include %%}'		=> '<?php include "\1";?>',
		'{echo %%}'       => '<?php echo \1 ;?>'
 	];

	foreach ($keys as $key => $val) {
		$pattern = '#'.str_replace('%%' , '(.+)' , preg_quote($key , '#')).'#imsU';
		
		$replace = $val;
		
		
		if (stripos($pattern , 'include')) {
			//处理 包含的问题
			
			$file = preg_replace_callback($pattern , 'parseInclude' , $file);
		} else {
			$file = preg_replace($pattern , $replace , $file);
		}
		
		
	}
	return $file;
}

//处理包含文件的函数

function parseInclude($data)
{
	
	$path = str_replace(['\'' , '\"'] , '' , $data[1]);
	
	display($path);
	
	$cacheFileName = rtrim(TPL_CACHE , '/') . '/' . str_replace('.' , '_' , $path) . '.php';
	
	return "<?php include '$cacheFileName';?>";
}
