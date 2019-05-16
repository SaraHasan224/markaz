<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Repositories\DeviceTokenRepository;
use App\Data\Models\DeviceToken;

class DeviceTokenRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('DeviceTokenRepository',function(){
            return new DeviceTokenRepository(new DeviceToken);
        });
    }
}
