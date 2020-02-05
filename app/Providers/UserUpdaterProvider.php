<?php
/**
 * The provider of UserUpdater Facade
 * PHP version 7.4
 *
 * @category Provider
 * @package  App\Providers
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserUpdaterProvider
 *
 * @category Provider
 * @package  App\Providers
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
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
