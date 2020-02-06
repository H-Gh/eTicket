<?php
/**
 * The listener which send notification on update tickets
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
use App\Events\TicketUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

/**
 * Class SendUpdatedTicketNotification
 *
 * @category Listener
 * @package  App\Listeners
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class SendUpdatedTicketNotification implements ShouldQueue
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
     * @param TicketUpdated $event The received event
     *
     * @return void
     */
    public function handle(TicketUpdated $event)
    {
        Notification::send(
            $event->ticket->createdBy,
            new \App\Notifications\TicketUpdated($event->ticket)
        );
    }
}
