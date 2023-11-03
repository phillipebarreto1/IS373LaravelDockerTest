<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function get(string $id): Movie {
        $movie = Movie::findOrFail($id);
        return $movie;
        /*return view('movies', [
            'movies' => Movie::findOrFail($id)
        ]);*/
    }
}
