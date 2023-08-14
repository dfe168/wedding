<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Token
{
    private static $key = 'ujOK?ag=b1Az'; // Change this to your secret key
    private static $expiration = 86400; // 1 day in seconds
    
    public static function generateJWT($user, $expYear = false)
    {
        $issuedAt = time();
        $expiration = $issuedAt + self::$expiration;

        if($expYear){
            $expiration = $issuedAt + (86400 * 365);
        }
        
        $data = [
            "user"=>$user,
            "website"=>"127.0.0.1"
        ];

        $tokenData = [
            'iat' => $issuedAt,         // Issued at: time when the token was generated
            'exp' => $expiration,       // Expiration time
            'data' => $data             // Data to be encoded in the token
        ];
        return JWT::encode($tokenData, self::$key, 'HS256');
    }

    public static function validateToken($token)
    {
            try {
                $decoded = JWT::decode($token, new Key(self::$key, 'HS256') );
                return $decoded;
            } catch (\Throwable $th) {
                return false;
                die('bad token');
            }
    }

    public static function generate_csrf_token(){

        return bin2hex(random_bytes(32));

    }














}
