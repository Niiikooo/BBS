<?php

	include 'config/config.php';
	define('FINDER', rtrim(WEBNAME,'/').'/helper/compiler/finder.php');
	// 酱底层函数递归寻找文件放入config文件中，从而无需多次调用
	include FINDER;
	// echo WEBNAME;
	// 连接数据库
	include finder('func_mysql.php');
	$link = connect($bbs_user['host'],$bbs_user['user'],$bbs_user['pwd'],$bbs_user['charset'],$bbs_user['dbName']);
	// insert($link,$a=['a' => 'b','c' => 'd']);
	// 
	// 
	// 
	// 头部文件开始
	// include '../../common.php';
	include finder('compiler.php');


	// 设置session名
	// echo session_name($_SERVER['REMOTE_ADDR']);
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}
	// 这个是导航条的函数
	$pid = pid($link,0,0);


//封装一个函数返回路径导航的相关数组，组合了导航条所需数组
	/**
	 * 路径导航函数
	 * @return array 路径导航的数组
	 */
	function breadcrumb($link){
		if (!isset($_GET['cid']) && !isset($_GET['tid'])) {
			return $cidData = [' '=>' '];
		}elseif (isset($_GET['tid'])){
			$details = select($link,'classid as cid,id as listid','bbs_details',"where id =".$_GET['tid']);
			$cid = $details[0]['cid'];
		}else{$cid = $_GET['cid'];}
		
		// var_dump($cid);
		// 获取当前板块全部信息
			// 板块信息
		
		$ciddata = select($link,'a.*,b.classname as bigname,b.cid as pid','bbs_category as a,bbs_category as b',"where a.cid = $cid and a.parentid = b.cid");
			// 帖子信息
		
		// 取出其中的键名
		// var_dump($ciddata);
		$cidd = $ciddata[0]['cid'];
		$pid = $ciddata[0]['pid'];
		// $parentid = $ciddata[0]['parentid'];
		$cidData["$pid"] = $ciddata[0]['bigname'];
		// $cidData['parentid'] = $parentid;
		$cidData['classname']["$cidd"] = $ciddata[0]['classname'];
		// var_dump($cidData);
		// var_dump($ciddata);
		// 如果为大板块，则cidData为空，设置如下
		if (!$ciddata) {
 			$ciddata = select($link,'classname','bbs_category',"where cid = $cid");
			$cidData[$cid] = $ciddata[0]['classname'];
			array_shift($cidData);
		}

		// 如果是帖子页面，则添加本帖子标题到路径导航栏
			// 帖子标题
			
		if (isset($_GET['tid'])) {
			$tid = $_GET['tid'];
			$title = select($link,'title','bbs_details',"where id=$tid");
			$title = $title[0]['title'];
			$cidData['tid'][$tid] =  $title;
		}
		return $cidData;

	}
	$breadcrumb = breadcrumb($link);
	// var_dump($breadcrumb);
// 头部文件结束
// 




// 这是板块管理员等信息
function bm($link,$cid){
	
// 今日发帖数目主题数目版主所需要的数据
	// 板块名字
	$nameArr = select($link,'classname','bbs_category',"where cid =$cid");
$cidname = $nameArr[0]['classname'];
	// 今日发帖数目
		// 当前时间戳（日期ymd）
		$time = strtotime("today");

	$listToday = select($link,'count(*)','bbs_details',"where addtime > $time and first = 1 and classid = $cid and isdel = 0");
$listToday = $listToday[0]['count(*)'];
	// var_dump($listToday);
	// 帖子总数，版主
		// 板块下帖子总数
		$detailsNum = select($link,'count(*)','bbs_details',"where classid = $cid and first = 1");
$detailsNum = $detailsNum[0]['count(*)'];
		// 版主名字字符串
		$bmID = select($link,'compere','bbs_category',"where cid = $cid");
		// 版主名字数组
		$bmID = explode(',',$bmID[0]['compere']);
		// 提取数据
		foreach ($bmID as $key => $value) {
			$bm = select($link,'username','bbs_userdata as b',"where b.uid = $value");
			$bmName[] = $bm[0]['username'];
		}
		// var_dump($bmName);
		// 帖子总数
$tNum = select($link,'count(*)','bbs_details',"where classid=$cid");
	$tNum = $tNum[0]['count(*)'];
	// 最新帖的titile,time,authorid
$new = select($link,'title,addtime,authorid','bbs_details',"where classid = $cid and first = 1",'','order by addtime desc','limit 0,1');
// var_dump($new,$cid);
	if (!isset($new) || $new == false) {
		$new=[0=>[
		'title'=>'',
		'addtime'=>'',
		'authorid'=>'']
		];
		// var_dump($new);
	}
		
		$newTitle = $new[0];
		$newTitle['authorid'] = uidToname($newTitle['authorid']);
	
	
	// var_dump($newData);
	//全部组装进一个数组
	return $bmdata = compact('cidname','listToday','detailsNum','bmName','tNum','newTitle');
}

// 酱作者和版主编号转化为用户名
	/**
	 * 酱数字id转化为用户名，可使用字符串
	 * @param  str $uid 用户id数字字符串
	 * @return array       一个包含uid=》用户名的数组
	 */
	function uidToname($uid){
		if (is_array($uid)) {
			$nameArr = explode(',', $uid);
		}else{
			$nameArr = [$uid]; 
		}
		
		$link = connect('localhost','root','','utf8','bbs');
		foreach ($nameArr as $key => $value) {
			$temp = select($link,'username','bbs_userdata',"where uid = $value");
			$newName[$value] = $temp[0]['username'];
		}
		// var_dump($newName);
		return $newName;
		
	}





?>