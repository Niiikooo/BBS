<!DOCTYPE html>
<html>
<head>
	<title>个性签名</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
</head>
<body>
<?php display('header.html',compact('pid','breadcrumb')) ;?>
<div id="main">
<div class="content clearFix">
	<div class="left_content">
		<ul>
			<li><h1>设置</h1></li>
			<li><a href="home_tx.php">修改头像</a></li>
			<li ><a href="home.php">个人资料</a></li>
			<li class="num1"><a href="home_sign.php">个人签名</a></li>
					<li><a href="home_password.php">密码安全</a></li>
			</ul>
		</div>

					<div class="right_content">
						<div class="first">
							<a href="home.php">个人签名</a>
						</div>
						<form action="/helper/compiler/home_sign_verify.php" method="post" style="margin:10px;">
							<input type="text" name="autograph" value="<?=$autograph;?>" style="width: 800px;height: 80px; " class="form-control">
							
							<input type="submit" value="提交" style="margin-top:10px;width: 50px;height: 30px;margin-left: 400px;" />
						</form>
					</div>
				</div>
			</div>
			<?php display('footer.html') ;?>
</body>
</html>
