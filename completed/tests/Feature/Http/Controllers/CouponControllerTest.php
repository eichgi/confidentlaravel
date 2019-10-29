<?php

namespace Tests\Feature\Http\Controllers;

use App\Coupon;
use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CouponControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_store_coupon_and_redirects()
    {
        $this->withoutExceptionHandling();

        $coupon = factory(Coupon::class)->create();

        $response = $this->get('/promotions/' . $coupon->code);

        $response->assertRedirect('/#buy-now');
        $response->assertSessionHas('coupon_id', $coupon->id);
    }

    /**
     * @test
     */
    public function it_does_not_store_coupon_for_invalid_code()
    {
        $response = $this->get('/promotions/invalid-code');

        $response->assertRedirect('/#buy-now');
        $response->assertSessionMissing('coupon_id');
    }

    /**
     * @test
     */
    public function it_does_not_store_an_expired_coupon()
    {
        $coupon = factory(Coupon::class)->state('expired')->create();

        $response = $this->get('/promotions/' . $coupon->id);

        $response->assertRedirect('/#buy-now');
        $response->assertSessionMissing('coupon_id');
    }

    /**
     * @test
     */
    public function it_does_not_store_a_previously_used_coupon()
    {
        $user = factory(User::class)->create();
        $coupon = factory(Coupon::class)->create();
        factory(Order::class)->create([
            'user_id' => $user->id,
            'coupon_id' => $coupon->id,
        ]);

        $response = $this->actingAs($user)->get('/promotions/' . $coupon->code);

        $response->assertRedirect('/#buy-now');
        $response->assertSessionMissing('coupon_id');
    }
}
