<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TweetService;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.footer', function ($view) {
            $service = app(TweetService::class);
            $view->with([
                'types' => $service->getTypes(),
                'counts' => $service->getTweetCountsByType(),
            ]);
        });
    }
}
