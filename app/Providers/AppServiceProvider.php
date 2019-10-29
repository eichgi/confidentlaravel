<?php

namespace App\Providers;

use App\Services\PaymentGateway;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        PaymentGateway::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['dashboard.index', 'videos.show', 'dashboard'], function ($view) {
            $user = request()->user();

            $view->with([
                'watched' => \App\Watch::where('user_id', $user->id)->get()->pluck('video_id'),
                'lessons' => \App\Lesson::orderBy('ordinal', 'asc')->get(),
                'videos' => \App\Video::orderBy('ordinal', 'asc')->get()->groupBy('lesson_id'),
                'user' => $user
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
