<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function createToken($userEmail,$userID):string
    {
        $key = env('JWT_KEY');
        $payload= [
            "iss" => 'dk_token',
            "iat" => time(),
            "exp" => time() + 60*60,
            "userEmail" => $userEmail,
            "userID" => $userID
        ];
        return JWT::encode($payload, $key, "HS256");
    }

    public static function loginToken($token):string
    {
        $key = env('JWT_KEY');
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        return $decoded->userID;
    }
}
