<?php
	require_once './VK.php';

	if(!isset($_GET['code'])){
		die('no code');
	} else {
		$code = $_GET['code'];
	}
	
	header('Location: ' . VK::TOKEN_REDIRECT_URI . '?access_token=' . VK::getAccessToken($code));