<?php
	require_once './VK.php';

	if(!isset($_GET['access_token'])){
		die('no token');
	} else {
		$token = $_GET['access_token'];
	}
	
	print($token);