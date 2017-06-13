<?php

	include '../../common.php';
	// include finder('compiler.php');
	setcookie(session_name(),session_id(),time()+3600,'/');
	// 判断是否登陆
	
		// echo '<style>.header_right_admin{
		// 	display:none;
		// }</style>';
		// 
	// 跳转页面地址参数
	if(!isset($_SERVER['HTTP_REFERER'])){
		$refer = '/index.php';
	}else{
		$refer = $_SERVER['HTTP_REFERER'];
	}
	// 判断是否用户名为空
	if(empty($_POST['username'])){
		$login = 'emptyName.html';

		display('login_verify.html',compact('login','refer','pid','breadcrumb'));
		exit();
	}
	$username = $_POST['username'];

	// if($_POST['password']==NULL){
	// 	exit('密码不能为空<a href="'.$_SERVER['HTTP_REFERER'].'" >返回</a>');
		
	// }
	if (empty($_POST['password'])) {
		$login = 'emptyPass.html';
		display('login_verify.html',compact('login','refer','pid'));
		exit();

	}

	$pwd = $_POST['password'];

	// 提取数据,是一个包含用户信息的数组，包括积分用户组
	$pwd_database = select_user($link,$username);
	var_dump($pwd_database);
// 登录成功
	if($pwd_database['password'] == $pwd){
		// 检测是否登陆失败5次被锁了ip
		if ($pwd_database['allowlogin'] == 0) {
			// 检验是否时间超出了锁定时间
			// 如果时间大于15分钟
			$time = time();
			if (($time - $pwd_database['lasttime'])>(10)) {
				$login = 'login_success.html';
				update($link,'bbs_userdata',"allowlogin=1,logintimes=0,lasttime=".time(),"where username = '$username'");
			}else{
				// 如果小于15分钟
				$login = 'iplock.html';
			display('login_verify.html',compact('login','pid','refer','breadcrumb'));
			exit();
			}	
		}else{
			if ($pwd_database['allowlogin']==1) {
				
			
		// 插入登陆成功的提示,并且存入session
		$login = 'login_success.html';
		// session操作
		$_SESSION['username'] = $username;
		$_SESSION['rewardscore'] = $pwd_database['rewardscore'];
		$_SESSION['group'] = $pwd_database['group'];
		$_SESSION['picture'] = $pwd_database['picture'];
		$_SESSION['uid'] = $pwd_database['uid'];
		$_SESSION['power'] = $pwd_database['power'];
		update($link,'bbs_userdata',"logintimes = 0,lasttime = ".time(),"where username = '$username'");
		}
		}

	}else{
// 密码不正确的时候
		$login = 'login_failed.html';
		// array_splice($_SESSION, 0);
		var_dump($_SESSION);
		// 失败的时候存入数据库一个字段，当前用户是否被锁账户
		// 
		$times = select($link,'logintimes','bbs_userdata',"where username = 'asdf'");
		$times = $times[0]['logintimes'];
		var_dump($times);
		// 登录失败次数获取后判定
		if ($times < 5 && $pwd_database['allowlogin']==1) {
			// 不足5次
			$times++;
			update($link,'bbs_userdata',"logintimes = $times","where username = '$username'");
		}elseif ($times ==5 && $pwd_database['allowlogin'] == 1){
			// 5次
			$login = 'iplock.html';
			update($link,'bbs_userdata',"logintimes = 0,allowlogin = 0,lasttime = ".time(),"where username = '$username'");
		}







		// 如果尝试次数不存在
		// if (!isset($_SESSION['notallow'])) {
		// 	$try =1 ;$_SESSION['notallow'] = [$username => $try];
		// 	var_dump($_SESSION,'asdfasdf');
		// }else{
		// 	$try++;$_SESSION['notallow'] = [$username => $try];

		// }
		
		// if ($_SESSION['notallow'][$username]>=5) {
		// // var_dump($username);
		// 	update($link,'bbs_userdata','allowlogin=0',"where username = '$username'");
		// }else{
		// 	// 当次数不够5次的时候
		// $lifeTime = 100000;
		// $remoteIp = $_SERVER['REMOTE_ADDR'];
		// setcookie(session_name($remoteIp), 'nihao', time() + $lifeTime, "/"); 
		// var_dump($_SESSION,$_COOKIE);
		// }
	}

	// var_dump($_SESSION);
	// var_dump($_POST);
	// var_dump($_SERVER);
	// var_dump($breadcrumb);
	display('login_verify.html',compact('login','pid','refer','breadcrumb'));
	// var_dump($_SESSION); 



?>