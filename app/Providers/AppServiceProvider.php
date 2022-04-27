<?php

namespace App\Providers;

use App\Services\BookService;
use App\Interfaces\BookInterface;
use App\Services\BookLocalService;
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
        if(app()->environment('local'))
        {
            $this->app->bind(BookInterface::class, function(){
                return new BookService();
            });
        }else{
            $this->app->bind(BookInterface::class, function(){
                return new BookLocalService();
            });
        }
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
