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
    return view('updateMovie');
})->middleware(RouteAuthentication::class);

Route::get('/movie/info', function () {
    return view('infoMovie');
})->middleware(RouteAuthentication::class);

Route::get('/movie/create', function () {
    return view('createMovie');
})->middleware(RouteAuthentication::class);

Route::get('/movie', function (Request $request) {
    /* Special route authentication for the main movie route */
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $jwt = new MyJWT;

        $auth = $jwt->get_auth_status_from_token($token);

        if ($auth == "true") {
            $user_id = $jwt->get_user_id_from_token($token);

            $data = Movie::all()->where('user_id', '=', $user_id);
            return view('viewMovies', ['data' => $data]);
        } 
    }
    return redirect('unauthorized');
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

