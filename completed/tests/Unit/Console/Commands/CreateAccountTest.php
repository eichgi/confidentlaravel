<?php

namespace Tests\Unit\Console\Commands;

use App\Mail\AccountCreated;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function it_creates_an_order_and_user_account()
    {
        $product = factory(Product::class)->create();

        $email = $this->faker->safeEmail;
        $transaction_id = $this->faker->md5;

        Mail::fake();

        $result = $this->artisan('make:account', [
            'email' => $email,
            'product_id' => $product->id,
            'transaction_id' => $transaction_id
        ])
            ->assertExitCode(0)
            ->run();

        $users = User::where('email', $email)->get();

        $this->assertSame(1, $users->count());

        $user = $users->first();

        $order = Order::query()
            ->where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->where('transaction_id', $transaction_id)
            ->where('total', $product->price)
            ->first();

        $this->assertNotNull($order);

        Mail::assertSent(OrderConfirmation::class, function ($mail) use ($order, $email) {
            return $mail->hasTo($email) && $mail->order->is($order);
        });

        Mail::assertSent(AccountCreated::class, function ($mail) use ($email) {
            return $mail->hasTo($email) && $mail->email === $email;
        });
    }
}
