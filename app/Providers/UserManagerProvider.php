<?php
/**
 * The provider of userManager Facade
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
 * Class UserManagerProvider
 *
 * @category Provider
 * @package  App\Providers
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class UserManagerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(
            'userManager',
            function () {
                return new App\Services\UserManagerService();
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
