<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Eloquents\CategoriesEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CategoriesRepository::class, CategoriesEloquentRepository::class);
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
