<?php
	include 'config.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<form action="update.php" method="post">
			主机名：<input type="text" value="<?=DB_HOST;?>" name="DB_HOST"/><br />
			用户名：<input type="text" value="<?=DB_USER;?>" name="DB_USER"/><br />
			密码：<input type="text" value="<?=DB_PWD;?>" name="DB_PWD"/><br />
			主机名：<input type="text" value="<?=DB_NAME;?>" name="DB_NAME"/><br />
			
			<input type="submit" value="修改" />
		</form>
	</body>
</html>	