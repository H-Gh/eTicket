<?php
/**
 * The provider of TicketUpdater Facade
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
 * Class TicketUpdaterProvider
 *
 * @category Provider
 * @package  App\Providers
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class TicketManagerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(
            'ticketUpdater',
            function () {
                return new App\Services\TicketManagerService();
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
