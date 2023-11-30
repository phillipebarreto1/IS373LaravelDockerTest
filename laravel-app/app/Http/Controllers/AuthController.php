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
}
