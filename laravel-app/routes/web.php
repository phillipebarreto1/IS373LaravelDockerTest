<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use Illuminate\Http\Request;

use App\Library\MyJWT;
use App\Http\Middleware\RouteAuthentication;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie/update', function () {
    // auth route
    
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $jwt = new MyJWT;

        $auth = $jwt->get_auth_status_from_token($token);

        if ($auth == "true") {
            return view('updateMovie');
        } else if ($auth == "false") {
            return view('notAuthenticated');
        }
    }
       
    return view('notAuthenticated');
});

Route::get('/movie/info', function () {
    return view('infoMovie');
})->middleware(RouteAuthentication::class);

Route::get('/movie/create', function () {
    // auth route
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $jwt = new MyJWT;

        $auth = $jwt->get_auth_status_from_token($token);

        if ($auth == "true") {
            return view('createMovie');
        } else if ($auth == "false") {
            return view('notAuthenticated');
        }
    }
       
    return view('notAuthenticated');
});

Route::get('/movie/delete', function () {
    // auth route
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $jwt = new MyJWT;

        $auth = $jwt->get_auth_status_from_token($token);

        if ($auth == "true") {
            return view('deleteMovie');
        } else if ($auth == "false") {
            return view('notAuthenticated');
        }
    }
       
    return view('notAuthenticated');
});

Route::get('/movie', function (Request $request) {
    // auth route
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $jwt = new MyJWT;

        $auth = $jwt->get_auth_status_from_token($token);

        if ($auth == "true") {
            $user_id = $jwt->get_user_id_from_token($token);

            $data = Movie::all()->where('user_id', '=', $user_id);
            return view('viewMovies', ['data' => $data]);
        } else if ($auth == "false") {
            return view('notAuthenticated');
        }
    }

    return view('notAuthenticated');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get(
    'viewMovies',
    [MovieController::class, 'show']
);

Route::get('/unauthorized', function() {
    return view('notAuthenticated');
});

