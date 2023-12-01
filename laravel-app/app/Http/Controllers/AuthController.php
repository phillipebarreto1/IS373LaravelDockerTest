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

class AuthController extends Controller
{
    //
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

        return redirect('/login');
    }

    public function login(Request $request): Response
    {
        // User registration

        $email_record = User::firstWhere('email', $request->username);
        $username_record = User::firstWhere('username', $request->username);

        if ($email_record != null) {
            if (Hash::check($request->password, $email_record->password)) {
                $encoded_token = $this->encode_auth_token($email_record->value('id'));

                $minutes = 60;
                $response = new Response('Set Cookie');
                $response->withCookie(cookie('token', $encoded_token, $minutes));
                return $response;

                /*return response()->json([
                    'msg' => 'Login Success',
                    //'token' => $encoded_token,
                ]);*/
            }
            else {
                $response = new Response('Password incorrect');
                return $response;
            }
        } else if ($username_record != null) {
            if (Hash::check($request->password, $username_record->password)) {
                $encoded_token = $this->encode_auth_token($username_record->value('id'));

                $minutes = 60;
                $response = new Response('Set Cookie');
                $response->withCookie(cookie('token', $encoded_token, $minutes));
                return $response;

                /*
                return response()->json([
                    'msg' => 'Login Success',
                    //'token' => $encoded_token,
                ]);
                */
            }
            else {
                $response = new Response('Password incorrect');
                return $response;   
            }
        }
        else {
            $response = new Response('User not found');
            return $response;
        }

        
        $response = new Response('Login Failed');
        return $response;

        /*return response()->json([
            'msg' => 'Login Failed',
        ]);*/
    }

    public function get_user_id_from_token(string $token): string {
        $decoded = $this->decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return $decoded_array['user_id'];
        }
        return "User not authenicated";
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
