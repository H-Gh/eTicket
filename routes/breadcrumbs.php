<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for(
    "home",
    function ($trail) {
        $trail->push(__("common.home_text"), route('home'));
    }
);

Breadcrumbs::for(
    "frontend.index",
    function ($trail) {
        $trail->push(__("common.home_text"), route('home'));
    }
);

Breadcrumbs::for(
    "admin.home",
    function ($trail) {
        $trail->push(__("common.admin_dashboard_text"), route('admin.home'));
    }
);

Breadcrumbs::for(
    "backend.index",
    function ($trail) {
        $trail->push(__("common.admin_dashboard_text"), route('admin.home'));
    }
);

Breadcrumbs::for(
    "admin.ticket.index",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(__("ticket.tickets_text"), route('admin.ticket.index'));
    }
);

Breadcrumbs::for(
    "admin.ticket.create",
    function ($trail) {
        $trail->parent("admin.ticket.index");
        $trail->push(__("ticket.new_ticket_text"), route('admin.ticket.create'));
    }
);

Breadcrumbs::for(
    "admin.ticket.edit",
    function ($trail, $ticket) {
        $trail->parent("admin.ticket.index");
        $trail->push(
            __("ticket.edit_ticket_with_number_text", ["number" => $ticket->id])
        );
    }
);

Breadcrumbs::for(
    "admin.ticket.show",
    function ($trail, $ticket) {
        $trail->parent("admin.ticket.index");
        $trail->push(
            __("ticket.ticket_with_number_text", ["number" => $ticket->id])
        );
    }
);

Breadcrumbs::for(
    "admin.user.index",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(
            __("auth.users_list_text"),
            route("admin.user.index")
        );
    }
);

Breadcrumbs::for(
    "admin.user.create",
    function ($trail) {
        $trail->parent("admin.user.index");
        $trail->push(
            __("auth.new_user_text")
        );
    }
);

Breadcrumbs::for(
    "admin.user.edit",
    function ($trail, $user) {
        $trail->parent("admin.user.index");
        $trail->push(
            __("auth.edit_user_with_number_text", ["number" => $user->id])
        );
    }
);

Breadcrumbs::for(
    "admin.user.show",
    function ($trail, $user) {
        $trail->parent("admin.user.index");
        $trail->push(
            __("auth.user_with_number_text", ["number" => $user->id])
        );
    }
);

Breadcrumbs::for(
    "admin.notification.index",
    function ($trail) {
        $trail->parent("admin.home");
        $trail->push(
            __("notification.notifications_text"),
            route("admin.notification.index")
        );
    }
);

Breadcrumbs::for(
    "admin.notification.show",
    function ($trail, $notification) {
        $trail->parent("admin.notification.index");
        $trail->push(
            __("notification.display_notification_text"),
            route(
                "admin.notification.show",
                [
                    "notification" => $notification
                ]
            )
        );
    }
);
