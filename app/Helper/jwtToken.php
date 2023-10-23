<?php

namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class jwtToken {
	public static function createToken($name, $email) {
		$key = env("TOKEN_KEY");
		$payload = [
			'iss' => 'lumen',
			'user' => $name,
			'email' => $email,
			'iat' => time(),
			'exp' => time() + 60,
		];
		return JWT::encode($payload, $key, 'HS256');
	}
	public static function verifyToken($token) {
		try {
			if ($token !== null) {
				$key = env("TOKEN_KEY");
				$decoded = JWT::decode($token, new Key($key, 'HS256'));
				return $decoded;
			} else {
				return "unauthorized";
			}
		} catch (Exception $e) {
			return "unauthorized";
		}
	}

}

?>