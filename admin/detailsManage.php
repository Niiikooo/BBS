<?php
	include '../common.php';
	

	$details = select($link,'*','bbs_details','where first = 1 and isdel = 0');
	// var_dump($details);


	// 处理板块信息
	foreach ($details as $key => $value) {
		// 处理板块名
		$classid = $value['classid'];
		$classname = select($link,'classname','bbs_category',"where cid = $classid");
		$classname = $classname[0]['classname'];
		
		$details[$key]['classname'] = $classname;
// 处理作者名字
		$author = uidToname($value['authorid'],$link);
		list($a,$authorName) = each($author);
		$details[$key]['authorName'] = $authorName;
		
		// var_dump($details); 

		// 最新回帖时间
		$time = $value['addtime'];
		$time = date('Y-m-d H:i:s',$time);
		$details[$key]['addtime'] = $time;

		
		}


		// 分页
		// 如果没有$_GET['page']
	if (!isset($_GET['page'])) {
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	// 每页个数
	$num = 10;
	// 总页数
	$count = ceil(count($details)/$num);

	// 酱所有的数据chunk
	if ($details) {
		$Det = array_chunk($details, $num,true);
	
	
	// var_dump($Det);
	// 如果当前页不存在
	if ($page == 0) {
		$newDetails = $details;
	}else{
		$newDetails = $Det[$page - 1];
	}
	// var_dump($newDetails);
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
	if ($next<2) {
		$next = 2;
	}
	// var_dump($newDetails);
	// 
	display('detailsManage.html',compact('pid','breadcrumb','newDetails','page','next','prev','count'));
