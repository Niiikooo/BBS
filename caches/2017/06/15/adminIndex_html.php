<!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
	<meta charset="utf-8">
		<meta charset="utf-8">
		<title><?=$title;?></title>
		<link rel="stylesheet" type="text/css" href="/public/css/adminIndex.css">
		<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
</head>
<body>
	<div class="top">
			<div class="top-left">
				<div class="top-left-top"><b>Discuz!</b></div>
				<div class="top-left-bottom"><a href="">Control panel</a></div>
			</div>
			<div class="center">
					<a href="/admin/adminIndex.php">站点信息</a>
					<a href="/admin/userManage.php">用户管理</a>
					<a href="/admin/categoryMan.php">板块管理</a>
					<a href="/admin/detailsManage.php">帖子管理</a>
				
			</div>
			<div class="right">
				<div class="right-top">欢迎 <b>admin</b> 后台管理</div>
				<div class="right-bottom">
					<span><a href="logout.php">【退出】</a></span>
					&nbsp;&nbsp;
					<a href="../index.php" target="blank">首页</a>
				</div>
			</div>
	</div>
	<div class="bottom">
		<div class="bottom-left">
			<div class="bottom-left-text"><a href="/admin/adminIndex.php">站点信息</a></div>
			<div class="bottom-left-text"><a href="/admin/link.php">友情链接</a></div>
		</div>
		<div class="bottom-right">
			<div class="bottom-connect">
				<h4><b><a href="/admin/adminIndex.php">站点信息</a></b></h4><br><br>
			<div>
			<form class="form-inline" action="/admin/siteinfo.php" method="post">
				<b>站点名称</b><br><br>
				<input type="text" value="<?=$site['siteName'];?>" class="form-control input-sm" name="siteName"><br><br>

				<b>网站名称</b><br><br>
				<input type="text" value="<?=$site['webName'];?>" class="form-control input-sm" name="webName"><br><br>

				<b>网站URL</b><br><br>
				<input type="text" value="<?=$site['url'];?>" class="form-control input-sm" name="url"><br><br>

				<b>网站备案信息代码</b><br><br>
				<input type="text" name="info" value="<?=$site['info'];?>" class="form-control input-sm"><br><br>

				<div class="bottom-connect-center">
				<b>站点状况</b>
				</div>
				<br>
				<input type="radio" name="siteStatus" value="1" checked>开启&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="siteStatus" value="2">关闭<br><br>	

				<button type="submit" class="btn btn-primary">保存</button>
		
				</form>
				</div>
				</div>	
				</div>
			</div>
</body>
</html>


		


	