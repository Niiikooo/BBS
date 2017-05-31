<!DOCTYPE html>
<html>
<head>
	<title>登录</title>
	<meta charset="utf-8">
</head>
<body>	
	
	<table>
	<form action="../../helper/compiler/register_verify.php" method="post">
		<tr><td>用户名：</td><td><input type="text" name="username" placeholder="请输入用户名"></td><br>
		<tr><td>密码：</td><td><input type="password" name="password" placeholder="请输入密码"></td><br>
		<tr><td>确认密码：</td><td><input type="password" name="repassword" placeholder="请重新输入密码"></td><br>
		<tr><td>邮箱：</td><td><input type="text" name="email" placeholder="请输入邮箱"></td><br>
		<tr><td>QQ：</td><td><input type="text" name="qq" placeholder="请输入QQ账号"></td><br>
		<tr><td>验证码：</td><td><input type="text" name="verify" ></td>
		<tr><td><input type="submit" value="提交"></td><td><input type="reset" value="重置"></td><td><input type="hidden" value="<?php echo time();?>" name="regtime" ></td></tr>

	</form>
	</table>
</body>
</html>