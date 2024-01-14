<?php

namespace App\Providers\Custom;

use App\Services\DatabaseDataService;
use Illuminate\Support\ServiceProvider;

class DatabaseDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('dbProvider', function(){
            return new DatabaseDataService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
