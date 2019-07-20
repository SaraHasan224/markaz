<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Repositories\FollowerRepository;
use App\Follower;


class FollowerRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('FollowerRepository',function(){
            return new FollowerRepository(new Follower);
        });
    }
}
