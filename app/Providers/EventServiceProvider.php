<?php

namespace App\Providers;

use App\Events\NewTicketPublished;
use App\Events\TicketAnswered;
use App\Events\TicketUpdated;
use App\Listeners\SendAnsweredTicketNotification;
use App\Listeners\SendNewTicketNotification;
use App\Listeners\SendUpdatedTicketNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewTicketPublished::class => [
            SendNewTicketNotification::class
        ],
        TicketAnswered::class => [
            SendAnsweredTicketNotification::class
        ],
        TicketUpdated::class => [
            SendUpdatedTicketNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
