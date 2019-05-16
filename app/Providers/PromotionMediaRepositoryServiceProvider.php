<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Repositories\PromotionMediaRepository;
use App\PromotionMedia;


class PromotionMediaServiceProvider extends ServiceProvider
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
        $this->app->bind('PromotionMediaRepository',function(){
            return new PromotionMediaRepository(new PromotionMedia);
        });
    }
}
