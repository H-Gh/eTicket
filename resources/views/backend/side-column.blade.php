<div class="side-column">
    <div class="content">
        <div class="logo">
            <a href="{{ route("home") }}">
                <div class="logo-image"></div>
            </a>
        </div>
        <div class="side-bar">
            <ul class="list">
                @include("backend.side-column-item",
                    [
                        "sidebarItem" => (new \App\Services\SidebarItem())
                            ->setIcon("fas fa-comment-alt")
                            ->setText(__("ticket.Tickets"))
                            ->setRouteName("admin.ticket.list")
                            ->addPermissions(["ticket.remove", "ticket.edit", "ticket.answer", "ticket.assign"])
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-list")
                                ->setText(__("ticket.Tickets list"))
                                ->setRouteName("admin.ticket.list")
                                ->addPermissions(["ticket.remove", "ticket.edit", "ticket.answer", "ticket.assign"])
                            )
                    ]
                )
                @include("backend.side-column-item",
                    [
                        "sidebarItem" => (new \App\Services\SidebarItem())
                            ->setIcon("fas fa-users")
                            ->setText(__("auth.Users"))
                            ->setRouteName("admin.user.list")
                            ->addPermissions(["user.add", "user.edit", "user.remove", "user.permission.assign"])
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-list")
                                ->setText(__("auth.Users list"))
                                ->setRouteName("admin.user.list")
                                ->addPermissions(["user.add", "user.edit", "user.remove", "user.permission.assign"])
                            )
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-plus")
                                ->setText(__("auth.New user"))
                                ->setRouteName("admin.user.create")
                                ->addPermission("user.add")
                            )
                    ]
                )
            </ul>
        </div>
    </div>
</div>