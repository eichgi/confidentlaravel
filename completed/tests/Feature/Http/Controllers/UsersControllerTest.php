<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\UsersController;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase, HttpTestAssertions;

    /**
     * @test
     */
    public function update_saves_data_and_redirect_to_dashboard()
    {
        $user = factory(User::class)->create();

        $name = $this->faker->name;
        $password = $this->faker->password(8);

        $response = $this->actingAs($user)->put('/users', [
            'name' => $name,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('/dashboard');

        $user->refresh();
        $this->assertEquals($name, $user->name);
        $this->assertTrue(Hash::check($password, $user->password));
    }

    /**
     * @test
     */
    public function update_uses_validation()
    {
        $this->assertActionUsesFormRequest(
            UsersController::class,
            'update',
            UserUpdateRequest::class
        );
    }


}
