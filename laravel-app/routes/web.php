<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

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

Route::get('/movie/get', function (){
    return view('getMovie');
});

Route::get('/movie/create', function (){
    return view('createMovie');
});

Route::get('/movie/delete', function (){
    return view('deleteMovie');
});

Route::get('/movie', function (){
    $data = Movie::all();
    return view('viewMovies', ['data'=> $data]);
});



Route::get('viewMovies', [MovieController::class, 'show']
);
