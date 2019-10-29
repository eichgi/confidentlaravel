<?php

namespace Tests\Unit\Services;

use App\Exceptions\PaymentGatewayChargeException;
use App\Order;
use App\Services\PaymentGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentGatewayTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function charge_collects_payment_with_stripe()
    {
        $subject = new PaymentGateway();

        $token = $this->createTestToken();
        $order = factory(Order::class)->create();
        $email = $this->faker->safeEmail;

        $actual = $subject->charge($token, $email, $order);

        $charge = $this->getStripeCharge($actual);

        $this->assertEquals($actual, $charge->id);
        $this->assertEquals($order->totalInCents(), $charge->amount);
        $this->assertEquals('usd', $charge->currency);
        $this->assertEquals($email, $charge->receipt_email);
        $this->assertEquals('Confident Laravel - ' . $order->product->name, $charge->description);
    }

    /**
     * @test
     */
    public function charge_throws_payment_gateway_exception()
    {
        $subject = new PaymentGateway();
        $order = factory(Order::class)->create();
        $email = $this->faker->safeEmail;

        $this->expectException(PaymentGatewayChargeException::class);

        $subject->charge('invalid-token', $email, $order);
    }

    private function createTestToken()
    {
        $token = \Stripe\Token::create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 7,
                'exp_year' => now()->addYear()->format('Y'),
                'cvc' => '314'
            ]
        ], ['api_key' => config('services.stripe.secret')]);

        return $token->id;
    }

    private function getStripeCharge(string $id)
    {
        return \Stripe\Charge::retrieve($id, ['api_key' => config('services.stripe.secret')]);
    }
}
