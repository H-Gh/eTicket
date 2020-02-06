<?php
/**
 * The event which will be fire when a new ticket created
 * PHP version 7.4
 *
 * @category Event
 * @package  App\Events
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Events;

use App\Ticket;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewTicketPublished
 *
 * @category Event
 * @package  App\Events
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class NewTicketPublished
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * The new ticket
     *
     * @var Ticket
     */
    public $ticket;

    /**
     * Create a new event instance.
     *
     * @param Ticket $ticket The new ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
}
