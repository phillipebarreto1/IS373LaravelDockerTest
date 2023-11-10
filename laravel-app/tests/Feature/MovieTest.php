<?php

namespace Tests\Feature;

use Database\Seeders\MovieSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_request(): void
    {
        $response = $this->postJson('/movie', ['title' => 'Matrix', 'yearReleased' => 1990, 'avgRating' => 5.0]);

        /*$response->assertStatus(201)
        ->assertJson([
            'created' => true,
        ]);*/
 
        $response->assertStatus(200);
    }

    public function test_get_request(): void {
        $response = $this->get('/movie/1');
 
        $response->assertStatus(200); 
    }
}
