<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Libs\Phisix\PhisixAPI;

class PhisixAPIServiceProvider extends ServiceProvider
{
    /**
     * Register the PhisixAPI instance
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PhisixAPI::class, function() {
            return new PhisixAPI;
        });
    }
}
