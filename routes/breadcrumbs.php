<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for(
    "home",
    function ($trail) {
        $trail->push(__("common.Home"), route('home'));
    }
);

Breadcrumbs::for(
    "admin.home",
    function ($trail) {
        $trail->push(__("common.Admin dashboard"), route('admin.home'));
    }
);

Breadcrumbs::for(
    "admin.ticket.list",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(__("ticket.Tickets"), route('admin.ticket.list'));
    }
);

Breadcrumbs::for(
    "admin.ticket.create",
    function ($trail) {
        $trail->parent("admin.ticket.list");
        $trail->push(__("ticket.New ticket"), route('admin.ticket.create'));
    }
);

Breadcrumbs::for(
    "admin.ticket.edit",
    function ($trail, $ticket) {
        $trail->parent("admin.ticket.list");
        $trail->push(
            __("ticket.Edit ticket #:number", ["number" => $ticket->id]),
            route('admin.ticket.edit', $ticket)
        );
    }
);

Breadcrumbs::for(
    "admin.ticket.show",
    function ($trail, $ticket) {
        $trail->parent("admin.ticket.list");
        $trail->push(
            __("ticket.Ticket #:number", ["number" => $ticket->id]),
            route('admin.ticket.show', $ticket)
        );
    }
);

Breadcrumbs::for(
    "admin.user.list",
    function ($trail) {
        $trail->push(
            __("auth.Users list")
        );
    }
);

Breadcrumbs::for(
    "admin.user.create",
    function ($trail) {
        $trail->parent("admin.user.list");
        $trail->push(
            __("auth.New user")
        );
    }
);

Breadcrumbs::for(
    "admin.user.edit",
    function ($trail, $user) {
        $trail->parent("admin.user.list");
        $trail->push(
            __("auth.Edit user #:number", ["number", $user->id])
        );
    }
);
