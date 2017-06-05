<?php
	session_start();
	include '../../common.php';
	include finder('compiler.php');
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
	display('logout.html');
	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);	
	}
