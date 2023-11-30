<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request): string {
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

    public function login(Request $request): string {
        // User registration
        $user = new User();

        $email_record = User::where('email', '=', $request->username)->first();
        $username_record = User::where('username', '=', $request->username)->first();

        if ($email_record != null) {
            $result = Hash::check($request->password , $email_record->value('password'));
            if ($result) {
                return "Login Success";
            }
        }

        else if ($username_record != null) {
            $result = Hash::check($request->password , $username_record->value('password'));
            if ($result) {
                return "Login Success";
            }
        }

        return "Login Failed";
    }
}
