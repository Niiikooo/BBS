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
	<form action="/helper/compiler/home_verify.php" method="post">
		<div class="content clearFix">
			<div class="left_content">
				<ul>
					<li><h1>设置</h1></li>
					<li><a href="home_tx.php">修改头像</a></li>
					<li class="num1"><a href="home.php">个人资料</a></li>
					<li><a href="home_qm.php">个人签名</a></li>
					<li><a href="home_password.php">密码安全</a></li>
				</ul>
			</div>

			<div class="right_content">
				<div class="first">
					<a href="">基本资料</a>
				</div>
				<table width="480" height="250">
					<tr>
						<td class="second">用户名</td>
						<td><?=$_SESSION['username'];?></td>
					</tr>
					<tr>
						<td class="second">真实姓名</td>
						<td><input type="text" name="realname" value="<?=$userdata['realname'];?>" /></td>
					</tr>
					<tr>
						<td class="second">性别</td>
						<td>
							<select name="sex">
								
								<option  value="2" <?php if($userdata['sex']==2):?>selected<?php endif;?>>保密</option>
								<option value="1" <?php if($userdata['sex']==1):?>selected<?php endif;?>>男</option>
								<option  value="0" <?php if($userdata['sex']==0):?>selected<?php endif;?>>女</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="second">生日</td>
						<td name="birthday">
							<select name="year">
					
								<?php for($i=2015;$i>1900;$i--):?>
								<option value="<?=$i;?>"  <?php if(date('Y',$userdata['birthday'])==$i):?>selected<?php endif;?>><?=$i;?>年</option>
								<?php endfor;?>
							</select>
							<select name="month">
								
								<?php for($i=1;$i<=12;$i++):?>
								<option value="<?=$i;?>" <?php if(date('m',$userdata['birthday'])==$i):?>selected<?php endif;?>><?=$i;?>月</option>
								<?php endfor;?>
							</select>
							<select name="day">
								
								<?php for($i=1;$i<=31;$i++):?>
								<option value="<?=$i;?>" <?php if(date('d',$userdata['birthday'])==$i):?>selected<?php endif;?>><?=$i;?>日</option>
								<?php endfor;?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="second">QQ号码</td>
						<td><input type="text" name="qq" value="<?=$userdata['qq'];?>" /></td>
					</tr>
					<tr>
						<td class="second"></td>
						<td><input type="submit"  value="保存" style="width: 50px;height: 40px;"></td>
					</tr>
					
				</table>
			</div>
		</div>
	</form>
	</div>
	
<?php display('footer.html') ;?>

</body>
</html>

	