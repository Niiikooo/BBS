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
				<div class="bottom-left-text"><a href="user.php">用户管理</a></div>
				<div class="bottom-left-text"><a href="closeip.php">禁用IP</a></div>
			</div>
			<div class="bottom-right">
				<div class="bs-example" data-example-id="striped-table">
				
				    <table class="table table-striped">
				      <tr>
						  <th>禁用ip</th>
		
				      </tr>
				    <form action="/admin/closeip_verify.php" method="post">
				      <tr>
				      
						  <td>
						  	<input type="text" name="ip" value="">

						  </td>

						<td>

						</td>
	
				      </tr>


				    	</table>
						<input type="submit" class="btn btn-primary" name="closeip" value="提交">
				     </form>  
 				 </div>
			</div>
		</div>
	</body>
</html>

	