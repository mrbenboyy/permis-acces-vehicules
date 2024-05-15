<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Send a GET request to the root URL
        $response = $this->get('/');

        // Assert that the response status code is 302 (redirect)
        $response->assertStatus(302);

        // Follow the redirect
        $response = $this->get($response->headers->get('Location'));

        // Assert that the final response status code is 200
        $response->assertStatus(200);
    }
}
