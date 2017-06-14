<?php
	include '../../common.php';

	$search = $_POST['search'];

	$where = "where title like '%$search%'";
	var_dump($search,$where);
	var_dump($where);


	// 查询数据
	$details = select($link,'*','bbs_details',$where);
	// var_dump($result);
	// 分页
	if (!isset($_GET['page'])) {
		$page = 0;
	}else{
		$page = $_GET['page'];
	}
	// 每页个数
	$num = 10;
	// 总页数
	$count = ceil(count($details)/$num);

	// 酱所有的数据chunk
	if ($details) {
		$Det = array_chunk($details, $num);
	
	
	// var_dump($Det);
	// 如果当前页不存在
	if ($page == 0) {
		$newDetails = $details;
	}else{
		$newDetails = $Det[$page - 1];
	}
	var_dump($newDetails);
	$prev = $page -1;
	if ($prev <1) {
		$prev = 1;
	}
	$next = $page + 1;
	if ($next > $count) {
		$next = $count;
	}
	}else{
		// 当没有帖子的时候
		$newDetails = null;
		$prev = 1;
		$next = 1;
	}

	// 编译
	display('search.html',compact('pid','breadcrumb','newDetails','page','next','prev','count'));