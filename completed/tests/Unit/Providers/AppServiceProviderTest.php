<?php

namespace Tests\Unit\Providers;

use App\Services\PaymentGateway;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function it_binds_payment_gateway_as_a_singleton()
    {
        $expected = resolve(PaymentGateway::class);

        $this->assertSame($expected, resolve(PaymentGateway::class));

    }
}
