<?php
	include '../../common.php';
	include finder('compiler.php');
	session_start();
	if(isset($_SESSION['username']) && $_SESSION['username']!=null){
		echo '<style>.visitor{
			display:none;
		}</style>';
	}else{
		$_SESSION['username'] = '';
		echo '<style>.header_right_admin{
			display:none;
		}</style>';
	}

	display('findpwd.html');