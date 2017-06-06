 <?php

	
	include 'common.php';
	include finder('compiler.php');
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		$_SESSION['username'] = '';
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}
	// 检验文件地址
	$login = 'helper/compiler/login_verify.php';
	// 将所有的帖子数据提取出来，是一个三维数组,同时限定是否有板块编号，如果有提取的时候只提取固定板块
	$cid = 0;
	if(isset($_GET['cid']) && $_GET['cid']>0){
		$cid = $_GET['cid'];
	}
	$data = category($link,$cid);
	// var_dump($data);
	// 这个是导航条的函数
	$pid = pid($link);
	// 帖子总数等信息汇总
	$tNum = select($link,'count(id) as count ','bbs_details','where isdel=0');
	$_SESSION['tNum'] = $tNum[0]['count'];

	// 会员总数汇总
	$uNum = select($link,'count(uid) as count','bbs_userdata');
	$_SESSION['uNum'] = $tNum[0]['count'];
	// 
	// 新会员查询
	$newUser = select($link,'regtime,username','bbs_userdata','','order by regtime desc');
	$_SESSION['newUser'] = $newUser[0]['username'];

	// 会员头像查询

	// 
	// 编译输出文件
  	display('index.html',$data = compact($_SESSION['username'],'login','data','pid'));

	// 将版块数据提起出来，从表bbs_category

	
	

	















?>