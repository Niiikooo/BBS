<!DOCTYPE html>
<html>
<head>
	<title>个人资料</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
</head>
<body>
<?php display('header.html',compact('pid','breadcrumb')) ;?>
<div id="main">
<!--中间内容-->
	<div class="content clearFix">
					
					<div class="left_content">
						<ul>
							<li><h1>设置</h1></li>
							<li class="num1"><a href="home_tx.php">修改头像</a></li>
							<li ><a href="home.php">个人资料</a></li>
							<li><a href="home_sign.php">个人签名</a></li>
							<li><a href="home_password.php">密码安全</a></li>
						</ul>
					</div>
					
					<div class="right_content">
						<h2 style="font-weight: 500;font-size: 16px;padding-left:5px;padding-top:15px;margin-bottom: 5px">当前我的头像</h2>
						<p style="margin:10px">如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像</p>
						
						<img src="<?=$_SESSION['picture'];?>" width="300px" height="300px" style="margin:10px" />

						<h2 style="font-weight: 500;font-size: 16px;padding-left:5px;padding-top:15px;margin-bottom: 5px">设置我的新头像</h2>

						<form action="home_tj.php" method="post" enctype="multipart/form-data">
							<br />
							<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
							<input type="file" name="picture" style="display: inline-block;">
							<input type="submit" value="上传" name="bt" style="display: inline-block;">		
						</form>

					</div>
				</div>
</div>
	<?php display('footer.html') ;?>
</body></html>

