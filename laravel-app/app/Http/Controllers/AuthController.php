<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Library\MyJWT;

class AuthController extends Controller
{
    public function register(Request $request): string
    {
        // User registration
        $user = new User();

        $email_record = User::where('email', $request->email)->first();

        if ($email_record != null) {
            return "Email exists";
        }

        $username_record = User::where('username', $request->username)->first();

        if ($username_record != null) {
            return "Username exists";
        }

        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return "Register Success";
    }

    public function login(Request $request): JsonResponse
    {
        // User login
        $email_record = User::firstWhere('email', $request->username);
        $username_record = User::firstWhere('username', $request->username);

        if ($email_record != null) {
            if (Hash::check($request->password, $email_record->password)) {
                $jwt = new MyJWT;
                $encoded_token = $jwt->encode_auth_token($email_record->id);

                return response()->json([
                    'msg' => 'Login Success',
                    'token' => $encoded_token,
                ]);
            }
        } else if ($username_record != null) {
            if (Hash::check($request->password, $username_record->password)) {
                $jwt = new MyJWT;
                $encoded_token = $jwt->encode_auth_token($username_record->id);

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

    public function get_user_id_from_token(string $token): string
    {
        $jwt = new MyJWT;
        $decoded = $jwt->decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return $decoded_array['user_id'];
        }
        return "User not authenicated";
    }
}
