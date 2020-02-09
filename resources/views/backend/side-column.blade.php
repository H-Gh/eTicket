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
                            ->setText(__("ticket.tickets_text"))
                            ->setRouteName("admin.ticket.index")
                            ->addPermissions(["ticket.remove", "ticket.edit", "ticket.answer", "ticket.assign"])
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-list")
                                ->setText(__("ticket.tickets_list_text"))
                                ->setRouteName("admin.ticket.index")
                                ->addPermissions(["ticket.remove", "ticket.edit", "ticket.answer", "ticket.assign"])
                            )
                    ]
                )
                @include("backend.side-column-item",
                    [
                        "sidebarItem" => (new \App\Services\SidebarItem())
                            ->setIcon("fas fa-users")
                            ->setText(__("auth.users_text"))
                            ->setRouteName("admin.user.index")
                            ->addPermissions(["user.add", "user.edit", "user.remove", "user.permission.assign"])
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-list")
                                ->setText(__("auth.users_list_text"))
                                ->setRouteName("admin.user.index")
                                ->addPermissions(["user.add", "user.edit", "user.remove", "user.permission.assign"])
                            )
                            ->addChild((new \App\Services\SidebarItem())
                                ->setIcon("fas fa-plus")
                                ->setText(__("auth.new_user_text"))
                                ->setRouteName("admin.user.create")
                                ->addPermission("user.add")
                            )
                    ]
                )
            </ul>
        </div>
    </div>
</div>