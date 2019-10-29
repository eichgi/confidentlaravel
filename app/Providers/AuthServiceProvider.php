<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('upgrade', function ($user) {
            return !\App\Order::where('user_id', $user->id)->where('product_id', \App\Product::FULL)->exists();
        });

        Gate::define('access', function ($user, \App\Lesson $lesson) {
            return $lesson->isFree() || $lesson->product_id <= optional($user->order)->product_id;
        });

        Gate::define('full-course', function ($user) {
            return \App\Order::where('user_id', $user->id)->where('product_id', \App\Product::FULL)->exists();
        });

        Gate::define('video-course', function ($user) {
            return \App\Order::where('user_id', $user->id)->exists();
        });
    }
}
