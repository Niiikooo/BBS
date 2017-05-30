<?php

$contents = file_get_contents('config.php');

//var_dump($contents);
//var_dump($_POST);

foreach ($_POST as $key => $value) {
	//echo $key.'-----'.$value.'<br />';
	
	$pattern = "/define\('$key' , .+\)/";
	
	//echo $pattern.'<br />';
	
	$string = "define('$key' , '$value')";
	
	//echo $string.'<br />';
	
	$contents = preg_replace($pattern , $string , $contents);
	
	//var_dump($content);
}

file_put_contents('config.php' , $contents);

