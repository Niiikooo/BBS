


<?php
	header("Location: ".$_SERVER['HTTP_REFERER']);
	// echo '<meta http-equiv="refresh" '."content=".'50;url='.$_SERVER['HTTP_REFERER'].">";
// echo '<meta http-equiv="refresh" '."content=".'2;url='.$_SERVER['HTTP_REFERER'].">";
	include '../common.php';
	var_dump($_POST);
	// 获取需要删除的uid值,组装成一个字符串
	if ($_POST == null) {

	}else{
	$uid = implode(',', $_POST['uid']);
	// var_dump($uid);
	// 更新用户的allowlogin值，-2位删除，-1为锁定
	update($link,'bbs_userdata','allowlogin = -2',"where uid in (".$uid.")");
// 
	if (isset($_GET['lock'])) {
		update($link,'bbs_userdata','allowlogin = -1',"where uid in (".$_GET['lock'].")");
	}elseif(isset($_GET['unlock'])){
		update($link,'bbs_userdata','allowlogin = 1',"where uid in (".$_GET['unlock'].")");
	}
	}
    
?>




	 
