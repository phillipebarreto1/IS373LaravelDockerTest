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
        // CREATE
        $email = $request->email;
        $username = $request->username;
        $password = $request->password;

        $user = new User();

        $email_record = User::where('email', '=', $email)->first();

        if ($email_record != null) {
            return "Email exists";
        }

        $username_record = User::where('username', '=', $username)->first();

        if ($username_record != null) {
            return "Username exists";
        }

        $user->email = $email;
        $user->username = $username;
        $user->password = Hash::make($password);

        $user->save();

        return redirect('/login');
    }
}
