<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Database\Seeders\MovieSeeder;
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

    public function create(Request $request): string {
        // Create
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->yearReleased = $request->yearReleased;
        $movie->avgRating = $request->avgRating;
        $movie->created_at = $request->updated_at;
        $movie->updated_at = $request->updated_at;
        

        $movie->save();
        return "Add a movie";
    }

    public function update(Request $request): string {
        // Update
        $movie = Movie::findOrFail($request->id);
        $movie->title = $request->title;
        $movie->avgRating = $request->avgRating;
        $movie->save();
        return "Update a movie";
    }

    public function delete(string $id): string {
        // Delete
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return "Delete a movie";
    }
}
