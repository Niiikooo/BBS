<?php

	include $_SERVER['DOCUMENT_ROOT'].'/common.php';
	include finder('details_func.php');
// 将帖子数据取出来
	$tid = $_GET['tid'];
	update($link,'bbs_userdata',"username = 'ff'",)
	// var_dump($tid);
	// 提取发帖
	$details = select($link,'*','bbs_details,bbs_userdata',"where first=1 and id=$tid");
	$details = $details[0];
	$reply = select($link,'*','bbs_details as a,bbs_userdata as b',"where a.first=0 and a.tid=$tid and a.authorid = b.uid",'','order by id asc');
	// var_dump($reply);

	$table['publish'] = $details;
	// var_dump($table);
	//点开帖子的时候更新数据库hits+1
	$hits = $table['publish']['hits'] + 1;
	$data = "hits = $hits";
	// var_dump($data);
	update($link,'bbs_details',$data,"where id = $tid");
	
	// var_dump($table);
// 处理时间
	// 发帖时间
	$addtime = $table['publish']['addtime'];

	$time = addtime($addtime);
	// 当天时间
	// $timeToday = strtotime(date('Y-m-d',time()));
	// // 如果时间在两天前则显示完全时间，否则显示贱时间
	// $timeoff = ($timeToday - $addtime)/24/3600;
	// if ($timeoff>2) {
	// 	$time = date('Y-m-d h:m:s',$addtime);
	// }elseif ($timeoff>1 && $time<=2) {
	// 	$time = '前天 '.date('h:i:s',$addtime);
	// }elseif ($timeoff<=1 && $timeoff >0) {
	// 	$time = '昨天 '.date('h:i:s',$addtime);
	// }else{
	// 	$time = '今天 '.date('h:i:s',$addtime);
	// }
	// 酱时间覆盖到addtime
	$table['publish']['addtime'] = $time;
	// 获得发帖人的aid
	$aid = $table['publish']['authorid'];
	// 获得发帖人的相关信息
	$user = userdata($link,$aid);

	// 获取回帖人的信息
	// 提取回复
	$reply = select($link,'*','bbs_details as a,bbs_userdata as b',"where a.first=0 and a.tid=$tid and a.authorid = b.uid",''.'order by addtime asc');
	// var_dump($reply);
	// var_dump($reply);
	if (!$reply) {
		
	}else{
	foreach ($reply as $key => $value) {
		$aid = $value['authorid'];
		$tcount = userdata($link,$aid,0);
		$reply[$key]['tcount'] = $tcount['tcount'];
		$reply[$key]['addtime'] = addtime($value['addtime']);
	}
	}
	$table['reply'] = $reply;
	// var_dump($table);

	// 发帖回复按钮能不能恩
	
	display('details.html',compact('pid','breadcrumb','table','user'));