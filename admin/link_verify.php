<?php
	include '../common.php';
	// var_dump($_POST);
	header("Location:".$_SERVER['HTTP_REFERER']);
	if (isset($_POST['operate']) && $_POST['operate'] == '删除') {
		$data = implode(',',$_POST['lid']);
		delete($link,'bbs_link',"where lid in ($data)");
	}elseif(isset($_POST['operate']) && $_POST['operate'] == '修改'){
		for ($i=1; $i <= count($_POST['name']); $i++) { 
			$displayorder = $_POST['displayorder'][$i];
			$name = $_POST['name'][$i];
			$url = $_POST['url'][$i];
			$description = $_POST['description'][$i];
			$logo = $_POST['logo'][$i];
			$addtime = time();
			update($link,'bbs_link',"displayorder = $displayorder, name = $name,url = $url,description = $description,logo = $logo,addtime = $addtime","where lid = $i");
		}

	}elseif (isset($_POST['add'])) {
		$displayorder = $_POST['displayorder'];
			$name = $_POST['name'];
			$url = $_POST['url'];
			$description = $_POST['description'];
			$logo = $_POST['logo'];
			$addtime = time();
		$data = compact('displayorder','name','url','description','logo','addtime');
		insert($link,'bbs_link',$data);
	}