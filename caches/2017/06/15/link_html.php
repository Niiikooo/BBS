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
			<h4><b><a href="">友情链接</a></b></h4><br>
			<div class="bottom-connect-center">
					<b>技巧提示: 未填写文字说明的项目将以紧凑型显示 | 站点名称为空则删除该站点</b>
			</div>
			<br>
			
			<div>
			
			    <table>
			      <thead>
			        <tr>
			          	<th width="200">显示顺序</th>
						<th width="200">站点名称</th>
						<th width="300">站点URL</th>
						<th width="600">文字说明</th>
						<th width="200">logo</th>
						
			        </tr>
			      </thead>
			      <tbody>
			      <form action="/admin/link_verify.php" method="post">
				<?php if($siteLink):?>
			      <?php foreach($siteLink as $key => $value):?>
			        <tr>
			          	<td height="50">
						<input type="checkbox" name="lid[<?=$value['lid'];?>]" value="<?=$value['lid'];?>">
			          	<input type="text" name="displayorder[<?=$value['lid'];?>]" size="2" value="<?=$value['displayorder'];?>"></td>
						<td><input type="text" name="name[<?=$value['lid'];?>]" size="10" value="<?=$value['name'];?>"></td>
						<td><input type="text" name="url[<?=$value['lid'];?>]" size="10" value="<?=$value['url'];?>"></td>
						<td><input type="text" name="description[<?=$value['lid'];?>]" size="50" value="<?=$value['description'];?>"></td>
						<th><input type="text" name="logo[<?=$value['lid'];?>]" size="8" value="<?=$value['logo'];?>"></th>
						
			        </tr>
			       <?php endforeach;?> 
			       <?php endif;?>
			      </tbody>
			    </table>
			    <input type="submit" name="operate" value="删除">
			    <input type="submit" name="operate" value="修改">
			    </form>
			</div>
			<br><br>
			<b><h4>添加友情链接:</h4></b>
			<br>
			<div>
			<form action="/admin/link_verify.php" method="post">
				<table>
					<tr>
						<th width="200">显示顺序</th>
						<th width="200">站点名称</th>
						<th width="300">站点URL</th>
						<th width="600">文字说明</th>
						<th width="200">logo</th>
					</tr>
					<tr>
						<td height="50"><input type="text" name="displayorder" size="2"></td>
						<td><input type="text" name="name" size="10"></td>
						<td><input type="text" name="url" size="10" value="http://"></td>
						<td><input type="text" name="description" size="50"></td>
						<th><input type="text" name="logo" size="8" placeholder="logo文件名"></th>
					</tr>
				</table>
				<input type="submit" value="点击添加" name="add">
			</form>	
			</div>
			</div>	
		</div>
		</div>
	</body>
</html>

	