<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /* 1. User Register Tests */

    /* 1.1 User Registration Success */

    public function test_register_success(): void
    {
        // 1.1.1 Test successful user registration
        $response = $this->postJson('/api/register', 
            [
                'email' => "test1000@email.com",
                'username' => "test1000",
                'password' => "test1000"
            ]);

        $response->assertStatus(200);

        $response->assertContent("Register Success");
    }

    /* 1.2 User Registration Failures */

    public function test_register_email_exist_failure(): void
    {
        // 1.2.1 Test unsuccessful user registration for email that already exist
        $response = $this->postJson('/api/register', 
            [
                'email' => "test1000@email.com",
                'username' => "test1001",
                'password' => "test1001"
            ]);

        $response->assertStatus(200);

        $response->assertContent("Email exists");
    }

    public function test_register_username_exist_failure(): void
    {
        
        // 1.2.2 Test unsuccessful user registration for username that already exist
        $response = $this->postJson('/api/register', 
            [
                'email' => "test1001@email.com",
                'username' => "test1000",
                'password' => "test1001"
            ]);

        $response->assertStatus(200);

        $response->assertContent("Username exists");
    }

    /* 2. User Login Tests */

    /* 2.1 User Login Successes */

    public function test_login_username_success(): void
    {
        // 2.1.1 Test login success with username
        $response = $this->postJson('/api/login', 
            [
                'username' => "test1000",
                'password' => "test1000",
            ]);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('msg', "Login Success")
                 ->etc()
        );
    }

    public function test_login_email_success(): void
    {
        // 2.1.2 Test login success with email
        $response = $this->postJson('/api/login', 
            [
                'username' => "test1000@email.com",
                'password' => "test1000",
            ]);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('msg', "Login Success")
                 ->etc()
        );
    }

    /* 2.2 User Login Failures */

    public function test_login_email_does_not_exist_failure(): void
    {
        // 2.2.1 Test login failure with email that does not exist
        $response = $this->postJson('/api/login', 
            [
                'username' => "test1001@email.com",
                'password' => "test1000",
            ]);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('msg', "Login Failed")
                 ->etc()
        );
    }

    public function test_login_password_wrong_for_email_failure(): void
    {
        // 2.2.2 Test login failure where password is wrong for the email
        $response = $this->postJson('/api/login', 
            [
                'username' => "test1000@email.com",
                'password' => "test1001",
            ]);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('msg', "Login Failed")
                 ->etc()
        );
    }

    public function test_login_password_wrong_for_username_failure(): void
    {
        // 2.2.3 Test login failure where password is wrong for the username
        $response = $this->postJson('/api/login', 
            [
                'username' => "test1000",
                'password' => "test1001",
            ]);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->where('msg', "Login Failed")
                 ->etc()
        );
    }
}
