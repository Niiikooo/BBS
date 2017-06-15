<!DOCTYPE html>
<html>
<head>
	<title>BBS</title>
	<meta charset="utf-8" >
	
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="/public/css/base.css"> 
	<link rel="stylesheet" type="text/css" href="/public/css/index.css">
	<link rel="stylesheet" type="text/css" href="/public/css/details.css"><link rel="stylesheet" type="text/css" href="../../public/css/list.css">
	<script type="text/javascript" src="/public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/public/ueditor/ueditor.all.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="../../public/css/list.css"> -->	
</head>
<body>
	<div id="container">
		<?php display('header.html',compact('pid','breadcrumb')) ;?>
		<!-- 主体开始 -->
		<?php display('details_main.html',compact('table','user','payment','power','count','prev','next','page')) ;?>
		<!-- 主体结束 -->
		<?php display('footer.html') ;?>
	</div>
</body>
</html>