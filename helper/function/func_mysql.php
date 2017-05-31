<?php

	//封装函数
	
	function connect($host,$user,$pwd,$charset,$dbName){
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
		$name = parseStr($name);
		$sql = 'select * from bbs_userdata where username = '.$name;
		echo $sql;
		$result = mysqli_query($link,$sql);
		var_dump($result);
		if(!$result){
			echo '用户名输入错误，请重新输入！';
			return $password = null;
		}
		$row = mysqli_fetch_assoc($result);
		var_dump($password = $row['password']);
		return $password;
	}




	/**
	 * 查询函数
	 * @param  链接 $link    链接
	 * @param  字段名 $fields  [description]
	 * @param  表 $sheet   表名
	 * @param  string $where   条件
	 * @param  string $groupBy 分组需要写groupby
	 * @param  string $orderBy 排序
	 * @param  string $limit   选几个
	 * @return [type]          返回一个结果数组
	 */
	function select($link,$fields,$sheet,$where='',$groupBy='',$orderBy='',$limit=''){
		$sql = 'select '.$fields.' from '.$sheet.' '.$where.' '.$groupBy.' '.$orderBy.' '.$limit;
		// echo $sql;
		$result = mysqli_query($link,$sql);
		if(!$result){
			echo '数据库查询失败！';
			return false;
		}
		if(!$result && mysqli_num_rows($result)){
			return false;
		}
		while ($rows = mysqli_fetch_assoc($result)){
			$data[]=$rows;
		}
		return $data;
	}


	// 插入函数，输入的数据是对应的数组
	/**
	 * 插入函数
	 * @param  [type] $link  [description]
	 * @param  [type] $sheet 表名
	 * @param  [type] $data  将插入内容变为关联数组
	 * @return [type]        bool
	 */
	function insert($link,$sheet,$data){
		foreach ($data as $key => $value) {
			$k[] = $key;
			$v[] = $value; 
		}
		$fields = implode(',', $k);
		$values = parseStr($v);
		$values = implode(',',$values);

		$sql = "insert into ".$sheet.' ('.$fields.')'.'values('.$values.'); ';
		echo $sql;
		$result = mysqli_query($link,$sql);
		if(!$result || !(mysqli_affected_rows($link))){
			return false;
		}
		return true;

	}

	// 删除
	function delect($link,$sheet,$where){
		$sql = 'delect from '.$sheet.'$where';
		$result = mysqli_query($link,$sql);
		if(!$result || !(mysqli_affected_rows($link))){

			echo '删除失败 ！~'; 
			exit();

		}
	}
	// 修改
	function updata($link,$sheet,$where){
		$sql = 'update '.$sheet.'set $data where '.$where;
		$result = mysqli_query($link,$sql);
		if(!$result || !(mysqli_affected_rows($link))){
			echo ('修改失败 ！~');
			exit();

		}

	}


	// 回调函数添加引号
	function parseStr($str){
		if (is_string($str)) {
			return $str = '\''.$str.'\'';
		}else if(is_array($str)){
			return array_map('parseStr',$str);
		}
	}