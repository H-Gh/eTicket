<?php

/**
 * This Class will handle all things that must be handle during ticket update
 * PHP version PHP 7.4
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Services;

use App\Ticket;
use Auth;
use Illuminate\Http\Request;

/**
 * Class TicketUpdaterService
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class TicketManagerService
{
    /**
     * This method will create a new ticket
     *
     * @param Request $request The Incoming request to update ticket
     *
     * @return bool
     */
    public function create(Request $request): bool
    {
        $ticket = new Ticket($request->all());
        $ticket->created_by = Auth::user()->getAuthIdentifier();
        return $ticket->save();
    }

    /**
     * This class will handle ticket update
     *
     * @param Request $request The Incoming request to update ticket
     * @param Ticket  $ticket  The target Ticket
     *
     * @return bool
     */
    public function update(Request $request, Ticket $ticket): bool
    {
        $ticket->fill($request->all());
        if ($this->isAnswered($request)) {
            return $ticket->answered($request->get("answer"));
        } else {
            return $ticket->save();
        }
    }

    /**
     * Check what if incoming request status is Ticket::ANSWERED
     *
     * @param Request $request The Incoming request to update ticket
     *
     * @return bool
     */
    private function isAnswered(Request $request): bool
    {
        return $request->get("status") === Ticket::ANSWERED;
    }

}
