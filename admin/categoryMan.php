<?php
	include '../common.php';
	$data = category($link,0,2);
	// var_dump($data);


	// 酱大板块数据提取出来
	// var_dump($data);
	$pid = select($link,'*','bbs_category' ,'where parentid = 0','','order by orderby');
	// var_dump($pid);
	// var_dump($data);
	display('categoryMan.html',compact('pid','breadcrumb','data','pid','link'));
