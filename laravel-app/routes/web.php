<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


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

Route::get('/movie/update', function (){
    return view('updateMovie');
});

Route::get('/movie/info', function (){
    return view('infoMovie');
});

Route::get('/movie/create', function (){
    return view('createMovie');
});

Route::get('/movie/delete', function (){
    return view('deleteMovie');
});

 function decode_auth_token(string $encoded_token)
    {
        $key = 'example_key';
        $decoded = JWT::decode($encoded_token, new Key($key, 'HS256'));
        return $decoded;
    }

    function get_user_id_from_token(string $token): string {
        $decoded = decode_auth_token($token);
        $decoded_array = (array) $decoded;
        if ($decoded_array['auth']) {
            return $decoded_array['user_id'];
        }
        return "User not authenicated";
    }

Route::get('/movie', function (Request $request){
    $token = $_COOKIE['token'];

    $user_id = get_user_id_from_token($token);

    $data = Movie::all()->where('user_id', '=', $user_id);
    return view('viewMovies', ['data'=> $data]);
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/register', function (){
    return view('register');
});

Route::get('viewMovies', [MovieController::class, 'show']
);

