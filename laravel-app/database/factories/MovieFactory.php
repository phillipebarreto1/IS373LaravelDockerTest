<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Movie::class;
    public function definition(): array
    {
        return [
            'id'=> fake()->id(),
            'title'=> fake()->title(),
            'yearReleased'=> now(),
            'avgRating'=> 8,


        ];
    }
}
