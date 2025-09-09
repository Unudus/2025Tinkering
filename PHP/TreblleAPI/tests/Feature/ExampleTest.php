<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_root_lacks_web_endpoint(): void
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }
}
