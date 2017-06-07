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
	$pid = pid($link);


//封装一个函数返回路径导航的相关数组，组合了导航条所需数组
	function breadcrumb(){
		$link = connect('localhost','root','','utf8','bbs');
		if (!isset($_GET['cid'])) {
			return $cidData = [''=>''];
		}
		$cid = $_GET['cid'];
		// var_dump($cid);
		// 获取当前板块全部信息
		$ciddata = select($link,'a.*,b.classname as bigname,b.cid as pid','bbs_category as a,bbs_category as b',"where a.cid = $cid and a.parentid = b.cid");
		// 取出其中的键名
		$cidd = $ciddata[0]['cid'];
		$pid = $ciddata[0]['pid'];
		$cidData["$pid"] = $ciddata[0]['bigname'];
		$cidData["$cidd"] = $ciddata[0]['classname'];
		var_dump($cidData);
		// var_dump($ciddata);
		// 如果为大板块，则cidData为空，设置如下
		if (!$ciddata) {
 			$ciddata = select($link,'classname','bbs_category',"where cid = $cid");
			$cidData[$cid] = $ciddata[0]['classname'];
			array_shift($cidData);
		}
		return $cidData;

	}
	$breadcrumb = breadcrumb();
	// var_dump($breadcrumb);
// 头部文件结束
// 




// 这是板块管理员等信息
function bm($link){
$classid = $_GET['cid'];
// 今日发帖数目主题数目版主所需要的数据
	// 板块名字
	$nameArr = select($link,'classname','bbs_category',"where cid =$classid");
$cidname = $nameArr[0]['classname'];
	// 今日发帖数目
		// 当前时间戳（日期ymd）
		$time = strtotime("today");

	$listToday = select($link,'count(*)','bbs_details',"where addtime > $time and first = 1");
$listToday = $listToday[0]['count(*)'];
	// var_dump($listToday);
	// 帖子总数，版主
		// 板块下帖子总数
		$detailsNum = select($link,'count(*)','bbs_details',"where classid = $classid and first = 1");
$detailsNum = $detailsNum[0]['count(*)'];
		// 版主名字字符串
		$bmID = select($link,'compere','bbs_category',"where cid = $classid");
		// 版主名字数组
		$bmID = explode(',',$bmID[0]['compere']);
		// 提取数据
		foreach ($bmID as $key => $value) {
			$bm = select($link,'username','bbs_userdata as b',"where b.uid = $value");
			$bmName[] = $bm[0]['username'];
		}
		// var_dump($bmName);
	//全部组装进一个数组
		return $bmdata = compact('cidname','listToday','detailsNum','bmName');
		var_dump($bmdata);
}
?>