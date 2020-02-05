<?php
/**
 * This class handle all events of Tickets
 * PHP version PHP 7.4
 *
 * @category Facade
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Facades;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * This class handle all events of Tickets
 * PHP version PHP 7.4
 *
 * @category Facade
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @method   static bool create(Request $request)
 * @method   static bool update(Request $request, Ticket $ticket)
 * @method   static bool isAnswered(Request $request)
 */
class TicketManager extends Facade
{
    /**
     * This method will define accessor of TicketUpdater
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ticketUpdater';
    }
}