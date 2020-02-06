<?php

namespace App\Notifications;

use App\Services\MessageFormatter;
use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TicketAnswered extends Notification
{
    use Queueable;

    /**
     * The new Ticket
     *
     * @var Ticket
     */
    private $ticket;

    /**
     * Create a new notification instance.
     *
     * @param Ticket $ticket The new Ticket
     */
    public function __construct(Ticket $ticket)
    {
        //
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable !
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param Ticket $notifiable !
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return ["id" => $this->ticket->id];
    }

    /**
     * This method will format the name of class
     *
     * @return string
     */
    public static function formatType(): string
    {
        return __("ticket.Your ticket was answered.");
    }

    /**
     * This method will return formatted message of notification
     *
     * @param int $ticketId The target Ticket ID
     *
     * @return string
     */
    public static function formatText(int $ticketId): string
    {
        $ticket = Ticket::findOrFail($ticketId);
        return (new MessageFormatter())
            ->setRoute(self::getRoute())
            ->setHeader(__("ticket.Your ticket was answered."))
            ->setBody(
                __(
                    "ticket.ticket_answered",
                    [
                        "id" => $ticket->id,
                        "answeredBy" => $ticket->answeredBy->name
                    ]
                )
            )
            ->addParameter("ticket", $ticketId)
            ->getMessage();
    }

    /**
     * Return to correct environment
     *
     * @return string
     */
    private static function getRoute()
    {
        if (strpos(request()->url(), "admin") !== false) {
            return "admin.ticket.show";
        } else {
            return "ticket.show";
        }
    }
}
