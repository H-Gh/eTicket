<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserUpdaterProvider
 *
 * @package App\Providers
 */
class UserUpdaterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(
            'userUpdater',
            function () {
                return new App\Services\UserUpdaterService();
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
