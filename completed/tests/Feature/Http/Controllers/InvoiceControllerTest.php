<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function create_returns_a_view()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('invoice.create'));

        $response->assertStatus(200);
        $response->assertViewIs('invoice.create');
    }
}
