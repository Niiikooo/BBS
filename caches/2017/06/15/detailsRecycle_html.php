<!DOCTYPE html>
<html>
<head>
	<title>帖子回收站</title>
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


	<div id="container">
		<div class="bottom-left">
			<div class="bottom-left-text"><a href="/admin/detailsManage.php">帖子管理</a></div>
			<div class="bottom-left-text"><a href="/admin/detailsRecycle.php">帖子回收站</a></div>
			<div class="bottom-left-text"><a href="/admin/replyManage.php">回帖管理</a></div>
			<div class="bottom-left-text"><a href="/admin/replyRecycle.php">回帖回收站</a></div>
		</div>
	<div class="cidMan">
	<div class="cm_t"><h2>帖子回收站</h2></div>
	<div>
		<form action="/admin/detailsRec_verify.php" method="post">
		<table class="cidMan">

		<!-- 开始遍历 -->
		
			<tr><th></th><th>标题</th><th>板块</th><th class="checkbox">作者</th><th>回复</th><th>浏览</th><th>最后发表</th></tr>
			<!-- 大板块开始 -->
			<?php if($details):?>
			<?php foreach($details as $key => $value):?>
			<tr class="admin_sigline"></tr>
			
			<tr><td><input type="checkbox" class="form-control details_checkbox" value="<?=$value['id'];?>" name="id[]"></td>
			<td><?=$value['title'];?></td>
			<td><?=$value['classname'];?></td>
			<td><?=$value['authorName'];?></td>
			<td><?=$value['replycount'];?></td>
			<td><?=$value['hits'];?></td>
			<td><?=$value['addtime'];?></td></tr>
				<tr class="admin_sigline"></tr>
<tr class="admin_sigline"></tr>
			<div class="clr"></div>
			
			
			<!-- 大板块结束 -->
			
			<!-- 隔开空间用 -->
			
			<!-- 小板块开始 -->
		
			
			<!-- 小板块结束 -->
			<?php endforeach;?>
			<?php endif;?>
			<tr class="admin_sigline"></tr>
			
			
			<!-- 结束遍历 -->
		</table>
		<input type="submit" class="btn btn-default sm" value="删除主题" name="del"><input type="submit" class="btn btn-default" value="恢复主题" name="recover">
		</form>
	</div>
</div>
	</div>
</body>
</html>