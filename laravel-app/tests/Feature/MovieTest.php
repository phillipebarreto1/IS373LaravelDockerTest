<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

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

    public function test_create_movie(): void
    {
        // CREATE Test Case
        $response = $this->postJson('/api/movie', ['title' => 'Matrix', 'yearReleased' => 1990, 'avgRating' => 5.0]);

        $response->assertStatus(200);

        $response->assertSeeText("HTTP/1.0 302 Found", $escaped = true);
        $response->assertSeeText("Location:      http://localhost/movie", $escaped = true);
    }

    public function test_get_movie(): void 
    {
        // READ Test Case
        $response = $this->getJson('/api/movie/1');

        $response->assertStatus(200); 
        
        $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->where('id', 1)
                 ->where('title', 'Matrix')
                 ->where('yearReleased', 1990)
                 ->where('avgRating', 5)
                 ->etc()
        );
        
    }

    public function test_update_movie(): void
    {
        // UPDATE Test Case
        $response = $this->patchJson('/api/movie', ['id' => 1, 'title' => 'The Matrix Reloaded', 'yearReleased' => 2003, 'avgRating' => 7.2]);

        $response->assertStatus(200);

        $response->assertSeeText("HTTP/1.0 302 Found", $escaped = true);
        $response->assertSeeText("Location:      http://localhost/movie", $escaped = true);
    }

    public function test_delete_movie(): void
    {
        // DELETE Test Case
        $response = $this->delete('/api/movie/1');

        $response->assertStatus(200);

        $response->assertContent("delete a movie");
    }
}
