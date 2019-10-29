<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use ProductsTableSeeder;
use Tests\DuskTestCase;

class PurchasePackageTest extends DuskTestCase
{
    use DatabaseMigrations, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ProductsTableSeeder::class);
    }

    /**
     * @test
     * @dataProvider packageDataProvider
     */
    public function it_can_purchase_a_package_and_create_account($package, $button_text)
    {
        $this->browse(function ($browser) use ($package, $button_text) {
            $browser->visit('/#buy-now')
                ->clickLink($button_text)
                ->waitFor('iframe[name=stripe_checkout_app]')
                ->withinFrame('iframe[name=stripe_checkout_app]', function ($browser) use ($package) {
                    $browser->waitForText($package);
                    $browser->keys('input[placeholder="Email"]', $this->faker->safeEmail)
                        ->keys('input[placeholder="Card number"]', '4242424242424242')
                        ->keys('input[placeholder="MM / YY"]', '01' . now()->addYear()->format('y'))
                        ->keys('input[placeholder="CVC"]', '123')
                        ->press('button[type="submit"')
                        ->waitUntilMissing('iframe[name=stripe_checkout_app]');
                })
                ->waitForReload()
                ->assertPathIs('/users/edit');
        });
    }

    public function packageDataProvider()
    {
        return [
            ['Starter', 'Buy Now $129 $89'],
            ['Master', 'Buy Now $229 $149'],
        ];
    }
}
