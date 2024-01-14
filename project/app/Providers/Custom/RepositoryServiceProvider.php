<?php

namespace App\Providers\Custom;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ReportImplantRepository;
use App\Repositories\Interfaces\ReportImplantInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReportImplantInterface::class, ReportImplantRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}