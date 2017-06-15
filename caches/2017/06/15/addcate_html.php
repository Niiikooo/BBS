<!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
	<meta charset="utf-8">
		<meta charset="utf-8">
		<title><?=$title;?></title>
		<link rel="stylesheet" type="text/css" href="/public/css/adminIndex.css">
		<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="../../public/css/admin.css">
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
		<div class="bottom-left">
			<div class="bottom-left-text"><a href="/admin/categoryMan.php">管理板块</a></div>
			<div class="bottom-left-text"><a href="/admin/addcate.php">添加板块</a></div>
		</div>
	<div id="container">
	<div class="cidMan">
	<div class="cm_t"><h2>添加管理</h2></div>
	<div>
		<form action="/admin/addcate_verify.php" method="post">
		<table>
			<tr style="margin-bottom: 10px"><td style="width:300px;">版块名称</td><td><input type="text" name="category"></td></tr>
			<tr style="height: 10px;"></tr>
			<tr><td>选择板块</td><td>
			
			<select name="bigcate" id="" style="font-size: 12px">
			<option value="1" selected>-大板块-</option>
			<?php foreach($data as $key => $value):?>
				<option value="<?=$value['classname'];?>"><?=$value['classname'];?></option><?php endforeach;?>
			</select><input type="submit" value="提交" style="width: 50px;margin-left:10px;"></td></tr>
			
		</table>
		</form>
	</div>
</div>
	</div>
</body>
</html>