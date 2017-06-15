<!DOCTYPE html>
<html>
<head>
	<title>个性签名</title>
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
	<div class="content clearFix">
					<div class="left_content">
						<ul>
							<li><h1>设置</h1></li>
							<li><a href="home_tx.php">修改头像</a></li>
							<li ><a href="home.php">个人资料</a></li>
							<li><a href="home_sign.php">个人签名</a></li>
							<li class="num1"><a href="home_password.php">密码安全</a></li>
						</ul>
					</div>
					<form action="home_password_verify.php" method="post" >
					<div class="right_content">
						<table>
							<tr>
								<td>您必须填写旧密码才能修改下面的资料</td>
							</tr>
							<tr>
								<td>旧密码</td>
								<td>
									<input type="password" style="height: 26px;" name="oldpas" class="form-control" />
								</td>
							</tr>
							<tr>
								<td>新密码</td>
								<td>
									<input type="password" style="height: 26px;" name="newpas" class="form-control" />
									<p>如不需要更改密码，此处请留空</p>
								</td>
							</tr>
							<tr>
								<td>确认新密码</td>
								<td><input type="password" style="height: 26px;" name="renewpas" class="form-control"/></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>
									<input type="text" name="email" class="form-control"/>
									<p>取回密码时使用</p>
								</td>
							</tr>
							<tr>
								<td>安全提问</td>
								<td>
									<input type="text" name="question" class="form-control" />
									<p>如果您启用安全提问，登录时需填入相应的项目才能登录</p>
								</td>
							</tr>
							<tr>
								<td>回答</td>
								<td>
									<input type="text" name="answer" class="form-control"/>
									<p>如您设置新的安全提问，请在此输入答案</p>
								</td>
							</tr>
							<tr>
								<td><input type="submit" value="提交"  style="width: 60px;height: 40px;" /></td>
							</tr>
						</table>
					</div>
					</form>
				</div>
</div>
<?php display('footer.html') ;?>
			

