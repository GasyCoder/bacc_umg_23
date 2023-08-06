<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ramsey\Uuid\Uuid;

class ApiKeyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api.key', function () {
            return Uuid::uuid4()->toString();
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
