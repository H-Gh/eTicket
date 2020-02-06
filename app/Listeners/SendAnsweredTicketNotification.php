<?php
/**
 * The listener which send notification on answer tickets
 * PHP version 7.4
 *
 * @category Listener
 * @package  App\Listeners
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Listeners;

use App\Events\TicketAnswered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

/**
 * Class SendAnsweredTicketNotification
 *
 * @category Listener
 * @package  App\Listeners
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class SendAnsweredTicketNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param TicketAnswered $event The received event
     *
     * @return void
     */
    public function handle(TicketAnswered $event)
    {
        Notification::send(
            $event->ticket->createdBy,
            new \App\Notifications\TicketAnswered($event->ticket)
        );
    }
}
