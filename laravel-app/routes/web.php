<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use Illuminate\Http\Request;

use App\Library\MyJWT;


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

/*Route::put('/movie/{id}', 'MovieController@update')->name('movie.update'); */

Route::get('/movie/update', function () {
    // auth
    return view('updateMovie');
});

Route::get('/movie/info', function () {
    // auth
    return view('infoMovie');
});

Route::get('/movie/create', function () {
    // auth
    return view('createMovie');
});

Route::get('/movie/delete', function () {
    // auth
    return view('deleteMovie');
});

Route::get('/movie', function (Request $request) {
    // auth
    $token = $_COOKIE['token'];

    $jwt = new MyJWT;

    $user_id = $jwt->get_user_id_from_token($token);

    $data = Movie::all()->where('user_id', '=', $user_id);
    return view('viewMovies', ['data' => $data]);
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

