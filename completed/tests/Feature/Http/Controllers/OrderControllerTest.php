<?php

namespace Tests\Feature\Http\Controllers;

use App\Coupon;
use App\Exceptions\PaymentGatewayChargeException;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\Services\PaymentGateway;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_discounted_price_for_coupon()
    {
        $coupon = factory(Coupon::class)->create([
            'percent_off' => 10
        ]);

        factory(Product::class)->create([
            'price' => 10
        ]);
        factory(Product::class)->create([
            'price' => 20
        ]);

        $response = $this->withSession(['coupon_id' => $coupon->id])->get('/');

        $response->assertOk();
        $response->assertViewIs('orders.index');
        $response->assertViewHasAll(['products', 'lessons', 'videos']);

        $response->assertSee('Buy Now</span> <s class="opacity-75 font-semibold text-sm">$10</s> $9');
        $response->assertSee('Buy Now</span> <s class="opacity-75 font-semibold text-sm">$20</s> $18');
    }

    /**
     * @test
     */
    public function store_charges_for_order_and_creates_account()
    {
        $product = factory(Product::class)->create();

        $token = $this->faker->md5;
        $email = $this->faker->safeEmail;
        $charge_id = $this->faker->md5;

        $paymentGateway = $this->mock(PaymentGateway::class);
        $paymentGateway->shouldReceive('charge')
            ->with($token, $email, \Mockery::on(function ($argument) use ($product) {
                return $argument->product_id == $product->id
                    && $argument->total == $product->price;
            }))
            ->andReturn($charge_id);

        $event = Event::fake();
        $mail = Mail::fake();

        $response = $this->post(route('order.store'), [
            'product_id' => $product->id,
            'stripeToken' => $token,
            'stripeEmail' => $email
        ]);

        $response->assertRedirect('/users/edit');

        $users = User::where('email', $email)->get();
        $this->assertSame(1, $users->count());

        $user = $users->first();
        $this->assertAuthenticatedAs($user);

        $this->assertDatabaseHas('orders', [
            'product_id' => $product->id,
            'total' => $product->price,
            'user_id' => $user->id,
            'transaction_id' => $charge_id
        ]);

        $order = Order::where('transaction_id', $charge_id)->first();

        $event->assertDispatched('order.placed', function ($event, $argument) use ($order) {
            return $argument->is($order);
        });
        $mail->assertSent(OrderConfirmation::class, function ($mail) use ($user, $order) {
            return $mail->order->is($order)
                && $mail->hasTo($user->email);
        });
    }

    /**
     * @test
     */
    public function store_returns_error_view_when_charge_fails()
    {
        $product = factory(Product::class)->create();

        $token = $this->faker->md5;
        $email = $this->faker->safeEmail;

        // mock PaymentGateway
        $paymentGateway = $this->mock(PaymentGateway::class);
        $exception = new PaymentGatewayChargeException(
            'sad path order exception',
            ['error' => ['data' => 'passed to view']]
        );
        $paymentGateway->shouldReceive('charge')
            ->with($token, $email, \Mockery::type(Order::class))
            ->andThrows($exception);

        $response = $this->post(route('order.store'), [
            'product_id' => $product->id,
            'stripeToken' => $token,
            'stripeEmail' => $email
        ]);

        $response->assertOk();
        $response->assertViewIs('errors.generic');
        $response->assertViewHas('template', 'partials.errors.charge_failed');
        $response->assertViewHas('data', ['data' => 'passed to view']);
    }

    /**
     * @test
     */
    public function store_applies_coupon_to_order()
    {
        $this->markTestIncomplete();
    }
}
