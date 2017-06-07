<?php
	
	include '../../common.php';
	// include finder('compiler.php');
	// if(isset($_SESSION['username']) && $_SESSION['username']!=null){
	// 	echo '<style>.visitor{
	// 		display:none;
	// 	}</style>';
	// }else{
	// 	$_SESSION['username'] = '';
	// 	echo '<style>.header_right_admin{
	// 		display:none;
	// 	}</style>';
	// }
	// 输出登出文件
	display('logout.html',compact('pid','breadcrumb'));
	// 删除session
	array_splice($_SESSION, 0);	
	var_dump($_SESSION);
	
