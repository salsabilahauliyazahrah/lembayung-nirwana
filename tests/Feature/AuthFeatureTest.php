<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

Class AuthFeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_google_auth_redirect(): void
    {
        $response = $this->get('/auth/google/redirect');

        $response->assertStatus(302);
    }
}