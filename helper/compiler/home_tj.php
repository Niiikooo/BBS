<?php
include '../../common.php';
include finder('upload.php');

header("Location: ".$_SERVER['HTTP_REFERER']);
$uid = $_SESSION['uid'];

$url = $_SERVER['HTTP_REFERER'];

// 修改头像	
if ($url == 'http://localhost/helper/compiler/home_tx.php') {

	$result = upload('picture', $_SERVER['DOCUMENT_ROOT'].'/upload', (pow(1024, 2) * 2), ['image/jpeg', 'image/png', 'image/gif', 'image/wbmp'], ['png', 'jpeg', 'jpg', 'gif', 'wbmp', 'bmp'], true);
// var_dump($result);
	if ($result[0] == 0) {
		$msg = $result[1];
		$url = $_SERVER['HTTP_REFERER'];
		echo '上传失败';
		exit();
	}
	$picture = strrchr($result[1],'/');
	$picture = '/upload'.$picture;
	var_dump($picture);
	// $res = dbUpdate('user', "picture='$picture'", 'uid=' . $uid);
	// var_dump($picture);
	$res = update($link,'bbs_userdata',"picture = '$picture'","where uid = $uid");
	// var_dump($res);
	if ($res) {
		$msg = '头像上传成功';
		$_SESSION['picture']= $picture;

		exit;
	} else {

		exit;
	}
}
// ============================个人前面修改页后台处理============================
// if ($url == 'http://lhyhost/likunbbs/home_qm.php') {
// 	$autograph = $_GET['autograph'];

// 	$res = dbUpdate('user', "autograph='$autograph'", ' uid=' . $uid);
// 	if ($res) {
// 		$msg = '个性签名修改成功';
// 		$url = $_SERVER['HTTP_REFERER'];
// 		include 'notice.php';
// 	} else {
// 		$msg = '您填写的信息格式有误';
// 		$url = $_SERVER['HTTP_REFERER'];
// 		include 'notice.php';
// 	}
// }
// // ============================密码安全修改页后台处理============================
// if ($url == 'http://lhyhost/likunbbs/home_password.php') {
// 	$msg = '您填写的信息格式有误';
// 	$url = $_SERVER['HTTP_REFERER'];
// 	include 'notice.php';
// }