<?php

namespace App\Providers;

use Dadata\DadataClient;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DadataClient::class, function (Application $app) {
            return new DadataClient(config('services.dadata.token'), config('services.dadata.secret'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
