<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
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
        $movie->user_id = $request->user_id;

        $movie->save();

        return redirect('/movie');
    }

    public function update(Request $request): string {
        // UPDATE
        $movie = Movie::findOrFail($request->id);
        $movie->title = $request->title;
        $movie->yearReleased = $request->yearReleased;
        $movie->avgRating = $request->avgRating;
        $movie->save();

        return redirect('/movie');
    }

    public function delete(string $id): string {
        // DELETE
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return "delete a movie";
    }
}
