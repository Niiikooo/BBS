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
	/**
	 * 用户名登录查询
	 * @param  [type] $link [description]
	 * @param  [type] $name 用户名输入
	 * @return [type]       返回用户密码
	 */
	function select_user($link,$name){
		$sql = 'select * from '.$bbs_link['prefix'].'userdata where username = '.$name;
		$result = mysqli_query($link,$sql);
		if(!$result && mysqli_num_rows($result)==null){
			return $password = null;
		}
		$row = mysqli_fetch_assoc($result);
		$password = $row['password'];
		return $password;
	}


	function select($link,$fields,$sheet,$where='',$groupBy='',$orderBy='',$limit=''){
		$sql = 'select '.$fields.'from '.$sheet.' where '.$where.' '.$groupBy.' '.$orderBy.' '.$limit;
		echo $sql;
		$result = myssqli_query($link,$sql);
		if(!$result && mysqli_num_rows($result)){
			return false;
		}
		while ($rows = mysqli_fetch_assoc($result)){
			$data[]=$rows;
		}
		return $data;
	}