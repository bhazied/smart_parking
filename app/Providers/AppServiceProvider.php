<?php

namespace App\Providers;

use App\Repositories\Contracts\IRepository;
use App\Repositories\CountryRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class,UserRepository::class);
        $this->app->bind(CountryRepository::class,CountryRepository::class);
        //$this->app->bind(IRepository::class);
    }
}
