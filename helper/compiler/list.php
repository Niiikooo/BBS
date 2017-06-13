<?php
// 头文件
	include '../../common.php';
	include  finder('details_func.php');
// 	include finder('compiler.php');
// 	session_start();
// // 这个是导航条的函数
// 	$pid = pid($link);
// // 判断是否登录
// 	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
// 		echo '<style>.visitor{
// 			display:none;
// 		}</style>';
// 	}else{
// 		$_SESSION['username'] = '';
// 		echo '<style>.header_right_admin{
// 			display:none;
// 		}</style>';
// 	}
// 	判断是否登录，publish为发帖按钮地址
	if (!isset($_SESSION['username'])) {
		$publish = '/helper/compiler/notlogin.php';
	}else{
		$publish = '/helper/compiler/publish.php';
	}
// 获得板块ID
	$classid = $_GET['cid'];
	// var_dump($classid);
// 根据小版块编号查询帖子数据
	$details = select($link,'*','bbs_details as a,bbs_userdata as b',"where a.classid=$classid and b.uid=a.authorid and first = 1 and isdel = 0",'','order by istop desc,addtime desc ');
	// var_dump($details);
	// 处理最后发表回复时间
	// 判断是否为空
	if ($details) {
		foreach ($details as $key => $value) {
		$time = select($link,'addtime','bbs_details',"where tid = ".$value['id']);
		$details[$key]['lastpost'] = addtime($time[0]['addtime']);
		}
	// var_dump($details);
	}
	// var_dump($details);
	// details帖子内容，对它处理分页
	// 如果没有$_GET['page']
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
	}
	
	// var_dump($_SERVER);
	

	// var_dump($details);

// 左侧导航栏所需数据
	$data = category($link,0,0);

	// var_dump($breadcrumb);

// $classid = $_GET['cid'];


// 今日发帖数目主题数目版主所需要的数据
// 	// 板块名字
// 	$nameArr = select($link,'classname','bbs_category',"where cid =$classid");
// $cidname = $nameArr[0]['classname'];
// 	// 今日发帖数目
// 		// 当前时间戳（日期ymd）
// 		$time = strtotime("today");

// 	$listToday = select($link,'count(*)','bbs_details',"where addtime > $time and first = 1");
// $listToday = $listToday[0]['count(*)'];
// 	// var_dump($listToday);
// 	// 帖子总数，版主
// 		// 板块下帖子总数
// 		$detailsNum = select($link,'count(*)','bbs_details',"where classid = $classid and first = 1");
// $detailsNum = $detailsNum[0]['count(*)'];
// 		// 版主名字字符串
// 		$bmID = select($link,'compere','bbs_category',"where cid = $classid");
// 		// 版主名字数组
// 		$bmID = explode(',',$bmID[0]['compere']);
// 		// 提取数据
// 		foreach ($bmID as $key => $value) {
// 			$bm = select($link,'username','bbs_userdata as b',"where b.uid = $value");
// 			$bmName[] = $bm[0]['username'];
// 		}
// 		// var_dump($bmName);
// 	//全部组装进一个数组
// 		return $bmdata = compact('cidname','listToday','detailsNum','bmName');
// 		var_dump($bmdata);
// }
	$bmdata = bm($link,$classid);
	// 路径导航函数breadcrumb集合在common.php中
	
	$cate = category($link,0,0);

	// 版主权限部分
	// 

// 使用模板文件编译html文件
	display('list.html',compact('newDetails','data','pid','publish','bmdata','breadcrumb','count','prev','next'));