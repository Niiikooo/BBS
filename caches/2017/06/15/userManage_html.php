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
				<div class="bottom-left-text"><a href="userManage.php">用户管理</a></div>
				<div class="bottom-left-text"><a href="closeip.php">禁用IP</a></div>
			</div>
			<div class="bottom-right">
				<div class="bs-example" data-example-id="striped-table">
				
				    <table class="table table-striped">
				      <tr>
						  <th>ID</th>
						  <th>用户名</th>	
						 
						  <th>性别</th>
						  <!-- <th>状态</th>	 -->
						  <th>权限</th>
						  <th>积分</th>
						  <th>等级</th>
						  <th>操作</th>			
				      </tr>
				    <form action="userDel.php" method="post">
					<?php foreach($userdata as $key => $value):?>
				      <tr>
				      
						  <td>
						  	<input type="checkbox" name="uid[]" value="<?=$value['uid'];?>">

						  </td>
						  <td><?=$value['username'];?></td>	
						  
						  <td><?php echo $value['sex'] == 1 ? '男': '女' ;?></td>
						  <td><?=$value['groupName'];?></td>	
						  <td><?=$value['rewardscore'];?></td>
						  <td><?=$value['level'];?></td>

						  <td>
						  
						  	<a href="/admin/userDel.php?lock=<?=$value['uid'];?>">锁定</a> 
						  	<a href="/admin/userDel.php?unlock=<?=$value['uid'];?>">解锁</a>

							<a href="/admin/member.php?uid=<?=$value['uid'];?>">查看详情</a>		
						  </td>		
				      </tr>
				      <?php endforeach;?>

				    	</table>
						<input type="submit" class="btn btn-primary" name="" value="删除所选">
				     </form>  
 				 </div>
			</div>
		</div>
	</body>
</html>

	
	