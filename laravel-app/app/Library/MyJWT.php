<?php

namespace App\Library;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MyJWT
{
    public function encode_auth_token(string $id): string
    {
        $key = 'example_key';
        $payload = [
            'auth' => true,
            'user_id' => $id,
        ];

        $encoded_token = JWT::encode($payload, $key, 'HS256');

        return $encoded_token;
    }

    public function decode_auth_token(string $encoded_token)
    {
        $key = 'example_key';
        $decoded = JWT::decode($encoded_token, new Key($key, 'HS256'));
        return $decoded;
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