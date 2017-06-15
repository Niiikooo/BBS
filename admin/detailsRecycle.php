<?php
	include '../common.php';
	

	$details = select($link,'*','bbs_details','where first = 1 and isdel = 1');
	// var_dump($details);

	if ($details) {
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
	}
	// 处理板块信息

	// 
	display('detailsRecycle.html',compact('pid','breadcrumb','details'));
