<?php
	
	include '../common.php';
	header("Location: ".$_SERVER['HTTP_REFERER']);
	// var_dump($_POST);
	$classname = $_POST['category'];
	$parentid = $_POST['bigcate'];
	


	if ($parentid == 1) {
		// 插入大板块
		$parentid = 0;
		$data = compact('classname','parentid');
	insert($link,'bbs_category',$data);
	}else{
		// 选取服板块id
		$id = select($link,'cid','bbs_category',"where classname = '$parentid'");
		// var_dump($id);
		$parentid = $id[0]['cid'];
		$data = compact('classname','parentid');
		// var_dump($data);
		insert($link,'bbs_category',$data);
	}
	