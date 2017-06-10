<?php
//准备画布
//准备颜色
//准备想要的字符
//写字
//画字符
//干扰线
//干扰点
//输出指定类型
//输出图片
//销毁资源
/*
*验证码函数
*@param $width string
*@param $height string
*@param $num int
*@param $type int
*@param $imgType string
*@param return string
*/
session_start();
verify(80,30,4);
function verify($width = 100 , $height = 40 , $num = 5 , $type = 1 , $imgType = 'jpeg')
{
	//准备画布
	$image = imagecreatetruecolor($width , $height);
	
	//准备颜色 （深色系 ， 浅色系）
	$string = '';
	//准备字符串
	switch ($type) {
		case 1:
			$str = '0123456789';
			$string = substr(str_shuffle($str) , 0 , $num);  //tangdaocheng.php
			break;
		case 2:
			//$str = 'abce';
			$arr = range('a' , 'z');
			shuffle($arr);
			$tmp = array_slice($arr , 0 , $num);
			$string = join('' , $tmp);
			break;
		case 3:
			
			for ($i=0;$i<$num;$i++) {
				$rand = mt_rand(0,2);
				switch ($rand) {
					case 0:
						$char = mt_rand(48 , 57);
						break;
					case 1:
						$char = mt_rand(97 , 122);
						break;
					case 2:
						$char =mt_rand(65 , 90);
						break;
				}
				$string .= sprintf('%c' , $char);
			}
			
			/*
			$str = '23456789abcdefghjkmnpqrstuvwsyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$string = substr(str_shuffle($str) , 0 , $num);
			*/
			break;
	}
	
	//生成背景颜色
	imagefilledrectangle($image , 0 , 0 , $width , $height , lightColor($image));
	
	//把你准备好的画布写上字
	for ($i=0;$i<$num;$i++) {
		$x = ceil($width/$num)*$i;
		$y = mt_rand(10 , $height - 20);
		imagechar($image , 5 , $x , $y ,$string[$i] , darkColor($image));
	}
	//画干扰点
	for ($i=0;$i<$width*$height/$num/10;$i++) {
		imagesetpixel($image , mt_rand(0 , $width) , mt_rand(0 , $height) , darkColor($image));
	}
	
	//画干扰线
	for ($i=0;$i<$num;$i++) {
		imagearc($image , mt_rand(10 , $width) , mt_rand(10 , $height) , mt_rand(10 , $width) , mt_rand(10 , $height) , mt_rand(0 , 10) , mt_rand(10 , 250) , darkColor($image));
	}
	
	//指定类型
	header('Content-type:image/'.$imgType);
	
	//输出
	$tmp = 'image'.$imgType;
	$tmp($image);
	//销毁资源
	
	imagedestroy($image);

	$_SESSION['qd'] = $string;
	
	return $string;
}

//深色系
function darkColor($image)
{
	return imagecolorallocate($image , mt_rand(0 , 120) , mt_rand(0 , 120) , mt_rand(0 , 120));
	//return $color;
}

//浅色系
function lightColor($image)
{
	$color = imagecolorallocate($image , mt_rand(130 , 255) , mt_rand(130 , 255) , mt_rand(130 , 255));
	return $color;
}

















