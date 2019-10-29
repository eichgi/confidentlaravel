<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('video.watched', function ($user, $video_id) {
            \Newsletter::addTags(['Video-' . $video_id], $user->email);
        });

        Event::listen('order.placed', function ($order) {
            \Newsletter::subscribe($order->user->email);
            \Newsletter::addTags([$order->plan->name], $order->user->email);
        });
    }
}
