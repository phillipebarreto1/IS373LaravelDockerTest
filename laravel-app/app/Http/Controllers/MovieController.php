<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    
    function show(){
        $data = Movie::all();
        return view ('viewMovies', ['movie'=>$data]);
    }
    
    public function get(string $id): Movie {
        // READ
        $movie = Movie::findOrFail($id);
        return $movie;
    }

    public function create(Request $request): string {
        // CREATE
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->yearReleased = $request->yearReleased;
        $movie->avgRating = $request->avgRating;

        $movie->save();
        return "Add a movie";
    }

    public function update(Request $request): string {
        // UPDATE
        $movie = Movie::findOrFail($request->id);
        $movie->title = $request->title;
        $movie->avgRating = $request->avgRating;
        $movie->save();
        return "Update a movie";
    }

    public function delete(string $id): string {
        // DELETE
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return "Delete a movie";
    }
}
