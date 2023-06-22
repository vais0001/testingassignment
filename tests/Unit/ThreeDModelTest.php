<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ThreeDModelTest extends TestCase
{
    /**
     * Test to see if 3D model page loads
     *
     * @return void
     */
    public function test_3D_model_page_loads()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/model');

        $response->assertStatus(200);
    }

    /**
     * Test to see if the page contains the right JavaScript import
     *
     * @return void
     */
    public function test_page_contains_right_script()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/model');

        $response->assertSee('resources/js/app.js');
    }
}
