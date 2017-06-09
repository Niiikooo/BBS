<!DOCTYPE html>
<html>
<head>
	<title>退出登录</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/publish_error.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">

</head>
<body>
	<?php display('header.html',compact('pid','breadcrumb')) ;?>

	<div class="publish_error">
		<div class="publish_error_main">
			<img src="../../public/img/check_right.gif" alt="发帖失败">
			<div class="place"></div>
			<div class="p_e_r">
				<p><span class="logout">你已经退出登录，现在已游客身份登录网站</span>，请稍候......</p>
				<p class="p_e_r_p"><a href="/index.php">如果你的浏览器没有自动跳转，请点击此链接</a></p>
			</div>
		</div>
	</div>

	<?php display('footer.html') ;?>
</body>
</html>

