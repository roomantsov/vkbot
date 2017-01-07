<?php

class VK
{
	const APP_URI = 'http://localhost/';
	const APP_ID = '5811080';
	const TOKEN = 'd02d6b28462bd6dc35a572df34e5620fc07ee972137b068f29b81762eeb7742fc240278f5de99407b3b91';
	const SECRET_KEY = 'XUEAqJpIwuUuIRrZgM3y';
	const VK_AUTH_API = 'https://oauth.vk.com/authorize';
	const VK_GET_TOKEN_URI = 'https://oauth.vk.com/access_token';
	const CODE_REDIRECT_URI = 'http://localhost/vk/code.php';
	const BLANK_REDIRECT_URI = 'https://oauth.vk.com/blank.html';
	const TOKEN_REDIRECT_URI = 'http://localhost/vk/access_token.php';

	public static function test(){
		print self::APP_ID;;
	}

	public static function getCode(){
		$params = [
			'client_id' => self::APP_ID,
			'redirect_uri' => self::BLANK_REDIRECT_URI,
			'response_type' => 'code',
			'scope' => 'messages'
		];
		$query = http_build_query($params);
		$uri = self::VK_AUTH_API . '?' . $query;
		header('Location: ' . $uri);
	}

	public static function getAccessToken($code){
		$params = [
			'client_id' => self::APP_ID,
			'client_secret' => self::SECRET_KEY,
			'redirect_uri' => self::APP_URI,
			'code' => 'b059c2be28262edae5',
			'response_type' => 'token'
		];
		$query = http_build_query($params);
		$uri = self::VK_GET_TOKEN_URI . '?' . urldecode($query);
		$token = json_decode(file_get_contents($uri), true)['access_token'];
		return $token;
	}
}