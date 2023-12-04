<?php

namespace App\Library;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MyJWT
{
    public function decode_auth_token(string $encoded_token)
    {
        $key = 'example_key';
        $decoded = JWT::decode($encoded_token, new Key($key, 'HS256'));
        return $decoded;
    }

    public function get_user_id_from_token(string $token): string
    {
        $decoded = $this->decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return $decoded_array['user_id'];
        }
        return "User not authenicated";
    }

    public function get_auth_status_from_token(string $token): string {
        $decoded = $this->decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return "true";
        }
        return "false";
    }
}



?>