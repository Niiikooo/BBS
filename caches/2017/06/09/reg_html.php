<!DOCTYPE html>
<html>
<head>
	<title>BBS</title>
	<meta charset="utf-8" >
	
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="../../public/css/index.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/publish_error.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/reg.css">
	
	
</head>
<body>         
	<div id="container">
		<?php display('header.html',compact('pid','breadcrumb')) ;?>
		<div class="reg_main">
		<!-- <div class="r_m_h">
			<p>立即注册</p>
		</div> -->
			<div class="r_m_b">
			<div class="r_m_b_m">
			<form action="register_verify.php" method="post">
				<div class="r_m_b_p">
				<p>立即注册</p></div>
				<table>
					<tr>
						<td class="tr_1">用户名：</td>
						<td><input type="text" name="username" placeholder="请输入用户名" class="form-control"></td><td>&nbsp;&nbsp;&nbsp;长度不能超过10个字符</td>
					</tr>
					<tr><td><div class="sig"></div><td><div class="sig"></div></td></td></tr>
					<tr>
						<td class="tr_1">密码：</td>
						<td><input type="password" placeholder="请输入密码" name="password" class="form-control"></td><td>&nbsp;&nbsp;&nbsp;长度为6-20<br>&nbsp;&nbsp;&nbsp;必须包含英文字母或其他字符</td>
					</tr>
					<tr><td><div class="sig"></div><td><div class="sig"></div></td></td></tr>
					<tr>
						<td class="tr_1">确认密码：</td>
						<td><input type="password" name="repassword" placeholder="再次输入密码" class="form-control"></td><td>&nbsp;&nbsp;&nbsp;长度为6-20</td>
					</tr>
					<tr><td><div class="sig"></div><td><div class="sig"></div></td></td></tr>
					<tr>
						<td class="tr_1">Email：</td>
						<td><input type="text" placeholder="请输入注册时留下的邮箱" name="email" class="form-control"></td>
					</tr>
					<tr><td><div class="sig"></div><td><div class="sig"></div></td></td></tr>
					<tr>
						<td class="tr_1">验证码：</td>
						<td><input type="text" placeholder="请输入验证码" name="verify" class="form-control"></td>
					</tr>
					<tr><td><div class="sig"></div><td><div class="sig"></div></td></td></tr>
					<tr>
						<td></td>
						<td><button type="submit" class="btn btn-default">提交</button><span>&nbsp;&nbsp;&nbsp;&nbsp;</span><input type="reset" class="btn btn-default"></td>
					</tr>
					<tr><td><div class="sig"><td><div class="sig"></div></td></div></td></tr>

				</table>
			</form></div>
			</div>
		</div>
		<?php display('footer.html') ;?>
	

</body>
</html>