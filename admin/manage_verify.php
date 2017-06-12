<?php

	include '../common.php';


	$i = 0;
// 更改板块信息
	foreach ($_POST['order'] as $key => $value) {
		
		$order = $value;
		$classname = parseStr($_POST['classname'][$i]);
		// var_dump($classname);
		$desc = parseStr($_POST['desc'][$i]);
		// 版主名需要更换成uid
		$bm = $_POST['bm'][$i];
		$bm = explode(',', $bm);
		// var_dump($bm);
		$bmName = '';
		foreach ($bm as $k => $v) {
			$temp = select($link,'uid','bbs_userdata',"where username = '$v'");
			$bmName = $temp[0]['uid'].','.$bmName ;

		}
		// var_dump($Temp);
		// $bmName = implode(',', $Temp);
		$bmName = rtrim($bmName ,',');
		$bmName = parseStr($bmName);
		// var_dump($bmName);
		
		// 酱需要更改的数据组装好
		// $data = compact('classname','desc','bm','order');
		// $data = implode(',',$data);
		$data = "orderby = $order,classname = $classname,description = $desc,compere  = $bmName";
		var_dump($data);
		update($link,'bbs_category',$data,"where cid = $key");
		$i = $i +1;
	}

// 隐藏不想看的板块
	update($link,'bbs_category','isdel = 1',"where cid in(".implode(',', $_POST['cid']).")");
