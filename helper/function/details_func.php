<?php
	// 帖子页面的所需函数
	// 
	// 帖子，经验，金币
	/**
	 * 返回发帖人的信息
	 * @param  [type] $link [description]
	 * @param  作者id $aid  bbs_details
	 * @return array       一个包含用户信息的数组
	 */
	function userdata($link,$aid,$first=1){
		$tcount = select($link,'count(*) as count','bbs_userdata as a,bbs_details as b',"where a.uid = $aid and b.authorid=$aid and first = $first");
		$tcount = $tcount[0]['count'];
		// var_dump($tcount);
		$user = select($link,'gold,exp,picture','bbs_userdata as a,bbs_details as b',"where a.uid = $aid and b.authorid=$aid and first = $first");
		$gold = $user[0]['gold'];
		$exp = $user[0]['exp'];
		$picture = $user[0]['picture'];
		$userdata = compact('tcount','gold','exp','picture');
		// var_dump($userdata);
		return $userdata;
	}
	$data = userdata($link,2);

	// 处理时间
	// 发帖时间
	function addtime($addtime){
	// $addtime = $table['publish']['addtime'];
	// 当天时间
	$timeToday = strtotime(date('Y-m-d',time()));
	// 如果时间在两天前则显示完全时间，否则显示贱时间
	$timeoff = ($timeToday - $addtime)/24/3600;
	if ($timeoff>2) {
		$time = date('Y-m-d h:m:s',$addtime);
	}elseif ($timeoff>1 && $time<=2) {
		$time = '前天 '.date('h:i:s',$addtime);
	}elseif ($timeoff<=1 && $timeoff >0) {
		$time = '昨天 '.date('h:i:s',$addtime);
	}else{
		$time = '今天 '.date('h:i:s',$addtime);
	}
	return $time;
}