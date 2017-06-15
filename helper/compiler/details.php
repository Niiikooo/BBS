<?php

	include $_SERVER['DOCUMENT_ROOT'].'/common.php';
	include finder('details_func.php');
	// var_dump($_SESSION);

// 将帖子数据取出来
	$tid = $_GET['tid'];
	// update($link,'bbs_userdata',"username = 'ff'",)
	// var_dump($tid);
	// 提取发帖
	$details = select($link,'*','bbs_details as a,bbs_userdata as b',"where a.first=1 and a.id=$tid and a.authorid = b.uid",'','order by istop');
	$details = $details[0];
	// var_dump($details['username']);die;
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
	// var_dump($);
	$table['reply'] = $reply;
	// var_dump($table);
	// var_dump($_SESSION);
	// 
	// 如果是金币帖，则加上相关内容
	
	

	if ($table['publish']['rate'] == 0) {
		// 不是金币帖
		$payment = $table['publish']['content'];
	}else{
		// 游客用户也能查看金币帖
		if (!isset($_SESSION['uid'])) {
			$payment = "<div><img src='/public/img/locked.gif' alt=''>付费主题，价格：<a href='/helper/compiler/detailOperation.php?pay={$table['publish']['id']}&rate={$table['publish']['rate']}' style='color:#f26c4f'>{$table['publish']['rate']}金钱</a></div>";
		}else{
			// 当用户登录时
			// 如果是自己的帖子
			if ($_SESSION['username'] == $table['publish']['username']) {
				$payment = $table['publish']['content'];
			}else{
			$ispayed = select($link,'uid','bbs_order',"where uid = ".$_SESSION['uid']." and tid = ".$table['publish']['id']);
			// 判断是否购买
			if ($ispayed) {
				// 购买了
				$payment = $table['publish']['content'];
				
			}else{
				// 没购买
				$payment = "<div><img src='/public/img/locked.gif' alt=''>付费主题，价格：<a href='/helper/compiler/detailOperation.php?pay={$table['publish']['id']}&rate={$table['publish']['rate']}' style='color:#f26c4f'>{$table['publish']['rate']}金钱</a></div>";
			}
		}

		}
		
		
		
	}

	// 管理员操作按钮
	// if (isset($_SESSION['power']) && $_SESSION['power'] != 0) {
	// 	$power = 1;
	// }else{
	// 	$power = 0;
	// }
	$power = $_SESSION['power'];
	// 
	// 分页处理
	if (!isset($_GET['page'])) {
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	// 每页个数
	$num = 10;
	// 总个数
	$totalNum = count($table['reply']) + 1;
	// 总页数
	$count = ceil((count($table['reply'])+1)/$num);

	// 酱所有的数据从数组中分zu
	// if ($) {
		// 第一页单独处理
		// var_dump($table);
		if ($page == 1 || $page == 0) {
			if ($table['reply']) {
				$table['reply'] = array_slice($table['reply'], 0,9,true);
			}

			
		}else{
			$offset = 10*($page-1);

			if (!$table['reply']) {
				$table['reply'] == null;
			}else{if (($offset +$num) > $totalNum) {

				$table['reply'] = array_slice($table['reply'], $offset,$num,true);
			}else{


			$table['reply'] = array_slice($table['reply'], 10*$page-1,10);
			}
			}
			
			
		}
		
	
	
	// var_dump($Det);
	// 如果当前页不存在

	// var_dump($newDetails);
	$prev = $page -1;
	if ($prev <1) {
		$prev = 1;
	}
	$next = $page + 1;
	if ($next > $count) {
		$next = $count;
	}
	// var_dump($table);
	// }else{
	// 	// 当没有帖子的时候
	// 	$newDetails = null;
	// 	$prev = 1;
	// 	$next = 1;
	// }
	// var_dump($table);
	// 发帖回复按钮能不能恩
	display('details.html',compact('pid','breadcrumb','table','user','payment','power','count','prev','next','page'));