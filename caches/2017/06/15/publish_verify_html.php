<!DOCTYPE html>
<html>
<head>
	<title>提交帖子</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/public/css/publish_error.css">
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="/public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="/public/css/index.css">
</head>
<body>
	<div id="container">
		<?php display('header.html',compact('pid','breadcrumb')) ;?>
		
		<?php display($publish_check,compact('tid')) ;?>


		<?php display('footer.html') ;?>
	</div>
</body>
</html>