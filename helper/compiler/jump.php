<?php
	
	$jump = $_POST['elevator'];
	$page = ceil($jump/10);
	$jump = $jump % 10;
	if ($jump == 0) {
		$jump = 10;
	}
	$tid = $_POST['tid'];
	// var_dump($_POST,$jump);

	$url = "/helper/compiler/details.php?tid=".$tid."&page=".$page."#details_".$jump;
	// var_dump($url);
	header("Location: $url");