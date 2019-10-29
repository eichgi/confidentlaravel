<?php

namespace Tests\Unit\Providers;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventServiceProviderTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function order_placed_event_subscribes_user_and_tags_package()
    {
        $order = factory(Order::class)->create();

        $newsletter = \Mockery::mock();

        $newsletter->shouldReceive('subscribe')
            ->with($order->user->email);

        $newsletter->shouldReceive('addTags')
            ->with([$order->product->name], $order->user->email);

        \Newsletter::swap($newsletter);

        event('order.placed', $order);
    }

    /**
     * @test
     */
    public function video_watched_tags_subscriber_with_video()
    {
        $newsletter = \Mockery::mock();

        $video_id = $this->faker->randomDigitNotNull;
        $user = factory(User::class)->create();

        $newsletter->shouldReceive('addTags')
            ->with(['Video-' . $video_id], $user->email);

        \Newsletter::swap($newsletter);

         event('video.watched', [$user, $video_id]);
    }
}
