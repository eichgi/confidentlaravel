<?php

namespace Tests\Unit\Http\Requests;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserUpdateRequestTest extends TestCase
{
    /** @var UserUpdateRequest */
    private $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = new UserUpdateRequest();
    }

    /**
     * @test
     */
    public function authorize_returns_false_when_unauthenticated()
    {
        $this->assertFalse($this->subject->authorize());
    }

    /**
     * @test
     */
    public function authorize_returns_true_when_authenticated()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user);

        $this->assertTrue($this->subject->authorize());
    }

    /**
     * @test
     */
    public function rules()
    {
        $this->assertSame([
            'name' => 'required|max:255',
            'password' => 'required|min:6|confirmed'
        ], $this->subject->rules());
    }


}
