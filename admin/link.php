<?php
	include '../common.php';
	$siteLink = select($link,'*','bbs_link');

	display('link.html',compact('siteLink'));