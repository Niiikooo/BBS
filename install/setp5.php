<?php
// if (file_exists('../install.lock')) {
// 	exit('网站已经被安装过了，如果需要重新安装网站，请删除 /install.lock 文件');
// }
include '../config/config.php';
if (!empty($_POST['submitname'])) {

	$conn = mysqli_connect($bbs_user['host'], $bbs_user['user'], $bbs_user['pwd'], $bbs_user['dbName']);

	if (mysqli_errno($conn)) {

		exit(mysqli_error($conn));
	}

	mysqli_set_charset($conn, $bbs_user['charset']);

	$username = trim($_POST['username']);

	$password = md5(trim($_POST['password']));

	$time = time();

	if ($_SERVER['REMOTE_ADDR'] == "::1") {
		$ip = ip2long('127.0.0.1');
	} else {
		$ip = ip2long($_SERVER['REMOTE_ADDR']);
	}

	$email = trim($_POST['email']);

	$sql = "insert into " . $bbs_user['prefix'] . "userdata(username,password,email,power,regtime,regip,lasttime) values('{$username}','{$password}','{$email}',-1,$time,$ip,$time)";
	// echo $sql;

	$result = mysqli_query($conn, $sql);

	if ($result && mysqli_affected_rows($conn)) {

		echo '安装成功';
		file_put_contents('../install.lock', '');
		header('location:../index.php');
		exit;

	} else {

		echo '添加管理员失败';

	}

	mysqli_close($conn);

}

?>