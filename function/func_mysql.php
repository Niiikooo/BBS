<?php

	//封装函数
	
	function connect($host,$user,$pwd,$chatset,$dbName){
		$link = mysqli_connect($host,$user,$pwd);
		if(!$link){
			exit('服务器错误');
		}
		mysqli_set_charset($link,$charset);
		mysqli_select_db($link,$dbName);
		return $link;
	}

	function select_user($link,$name){
		$sql = 'select * from '.$bbs_link['prefix'].'userdata where username = '.$name;
		$result = mysqli_query($link,$sql);
		if(!$result && mysqli_num_rows($result)==null){
			return $password = null;
		}
		$row = mysqli_fetch_assoc($result);
		$password = $row['password']
		return $password;
	}