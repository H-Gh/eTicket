<?php
/**
 * The listener which send notification on new tickets
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

use App\Events\NewTicketPublished;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Notification;

/**
 * Class SendNewTicketNotification
 *
 * @category Listener
 * @package  App\Listeners
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class SendNewTicketNotification implements ShouldQueue
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
     * @param NewTicketPublished $event The received event
     *
     * @return void
     */
    public function handle(NewTicketPublished $event)
    {
        $users = User::permission("ticket.answer")->get();
        Notification::send(
            $users,
            new \App\Notifications\NewTicketPublished($event->ticket)
        );
    }
}
