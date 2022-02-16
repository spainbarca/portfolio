<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_see_all_projects()
    {
        $user = factory('App\User')->create();
        dd($user->toArray());

        $this->withoutExceptionHandling();

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
    }
}
