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
			<div class="bottom-left-text"><a href="#">管理板块</a></div>
			<div class="bottom-left-text"><a href="/admin/addcate.php">添加板块</a></div>
		</div>
	<div id="container">
	<div class="cidMan">
	<div class="cm_t"><h2>版块管理</h2></div>
	<div>
		<form action="/admin/manage_verify.php" method="post">
		<table class="cidMan">

		<!-- 开始遍历 -->
		
			<tr><th>显示顺序</th><th>版块名称</th><th>版块介绍</th><th class="checkbox">隐藏版块</th><th>设置版主</th></tr>
			<!-- 大板块开始 -->
			<?php foreach($data as $key => $value):?>
			<tr class="admin_sigline"></tr><tr class="admin_sigline"></tr><tr class="admin_sigline"></tr>
			<?php foreach($pid as $K => $V):?>
			<?php if($V['classname'] != $key):?>
			<?php else: ?>
			<tr><td><input type="text" class="form-control" value="<?=$V['orderby'];?>" name="order[<?=$V['cid'];?>]"></td>
			<td><input type="text" class="form-control" value="<?=$V['classname'];?>" name="classname[]"></td>
			<td><input type="text" class="form-control" value="<?=$V['description'];?>" name="desc[]"></td>
			<td class="checkbox"><input type="checkbox" class="check" name="cid[]" value="<?=$V['cid'];?>"></td><td><input type="text" class="form-control" value="<?php $uid = uidToname($V['compere'],$link);
				echo implode(',',$uid) ;?>" name="bm[]"></td></tr>
				<tr class="admin_sigline"></tr>

			<div class="clr"></div>
			<?php endif;?>
			<?php endforeach;?>
			<!-- 大板块结束 -->
			<?php if($value != null):?>
			<?php foreach($value as $k => $v):?>
			<!-- 隔开空间用 -->
			<tr class="admin_sigline"></tr>
			<!-- 小板块开始 -->
			<tr><td><input type="text" value="<?=$v['orderby'];?>" class="form-control" name="order[]"></td><td><span>|————</span><input type="text" value="<?=$v['classname'];?>" class="form-control classname" name="classname[]"></td><td><input type="textarea" class="form-control" value="<?=$v['description'];?>" name="desc[]"></td><td class="checkbox" style="width: 50px"><input type="checkbox" name="cid[]" value="<?=$v['cid'];?>" class="check"></td><td><input type="text" class="form-control" value="<?php $uid = uidToname($v['compere'],$link);echo implode(',',$uid) ;?>" name="bm[]"></td></tr>
			<?php endforeach;?>
			<?php endif;?>
			
			<!-- 小板块结束 -->
			<?php endforeach;?>
			<tr class="admin_sigline"></tr>
			<tr><td><input type="submit" class="btn btn-default" value="提交"></td></tr>
			
			<!-- 结束遍历 -->
		</table>
		</form>
	</div>
</div>
	</div>
</body>
</html>