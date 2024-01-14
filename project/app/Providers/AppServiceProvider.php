<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (config('app.env') == 'production') {
            $this->app->usePublicPath(base_path() . '/../public_html');
            $this->app->useStoragePath(base_path() . '/../public_html/storage');
        }
        if (config('app.env') == 'testing') {
            $this->app->usePublicPath(base_path() . '/../public_html');
            $this->app->useStoragePath(base_path() . '/../public_html/storage');
        }
        if (config('app.env') == 'local') {
            $this->app->usePublicPath(base_path() . '/../public_html');
            $this->app->useStoragePath(base_path() . '/../public_html/storage');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
