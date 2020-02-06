<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for(
    "home",
    function ($trail) {
        $trail->push(__("common.Home"), route('home'));
    }
);

Breadcrumbs::for(
    "frontend.index",
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
    "backend.index",
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
            __("ticket.Edit ticket #:number", ["number" => $ticket->id])
        );
    }
);

Breadcrumbs::for(
    "admin.ticket.show",
    function ($trail, $ticket) {
        $trail->parent("admin.ticket.list");
        $trail->push(
            __("ticket.Ticket #:number", ["number" => $ticket->id])
        );
    }
);

Breadcrumbs::for(
    "admin.user.list",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(
            __("auth.Users list"),
            route("admin.user.list")
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
            __("auth.Edit user #:number", ["number" => $user->id])
        );
    }
);

Breadcrumbs::for(
    "admin.user.show",
    function ($trail, $user) {
        $trail->parent("admin.user.list");
        $trail->push(
            __("auth.User #:number", ["number" => $user->id])
        );
    }
);

Breadcrumbs::for(
    "admin.notification.list",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(
            __("notification.Notifications"),
            route("admin.notification.list")
        );
    }
);

Breadcrumbs::for(
    "admin.notification.show",
    function ($trail, $notification) {
        $trail->parent("admin.notification.list");
        $trail->push(
            __("notification.Display notification"),
            route(
                "admin.notification.show",
                [
                    "notification" => $notification
                ]
            )
        );
    }
);
