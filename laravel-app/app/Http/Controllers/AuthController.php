<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{
    //
    public function register(Request $request): string
    {
        // User registration
        $user = new User();

        $email_record = User::where('email', '=', $request->email)->first();

        if ($email_record != null) {
            return "Email exists";
        }

        $username_record = User::where('username', '=', $request->username)->first();

        if ($username_record != null) {
            return "Username exists";
        }

        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login');
    }

    public function login(Request $request): JsonResponse
    {
        // User registration
        $user = new User();

        $email_record = User::where('email', '=', $request->username)->first();
        $username_record = User::where('username', '=', $request->username)->first();

        if ($email_record != null) {
            $result = Hash::check($request->password, $email_record->value('password'));
            if ($result) {
                $encoded_token = $this->encode_auth_token($email_record->value('id'));

                return response()->json([
                    'msg' => 'Login Success',
                    'token' => $encoded_token,
                ]);
            }
        } else if ($username_record != null) {
            $result = Hash::check($request->password, $username_record->value('password'));
            if ($result) {
                $encoded_token = $this->encode_auth_token($username_record->value('id'));

                return response()->json([
                    'msg' => 'Login Success',
                    'token' => $encoded_token,
                ]);
            }
        }

        return response()->json([
            'msg' => 'Login Failed',
        ]);
    }

    public function get_token_auth_status(string $token): string {
        $decoded = $this->decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return "true";
        }
        return "false";
    }

    public function encode_auth_token(string $id)
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
}
