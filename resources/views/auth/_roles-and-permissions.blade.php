@can("user.permission.assign")
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 roles-permissions-container">
        <div class="section">
            {{ __("auth.roles_and_permissions") }}
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    @include(
"auth.role-permissions",
[
"user" => (isset($user) ? $user : null),
"role" => [
"index" => "user.admin",
"name" => __("auth.users_admin_role_text"),
"description" => __("auth.admin_user_role_description")
],
"permissions" => [
[
"index" => "user.add",
"name" => __("auth.add_user_permission_text"),
"description" => __("auth.add_user_permission_description"),
],
[
"index" => "user.edit",
"name" => __("auth.edit_user_permission_text"),
"description" => __("auth.edit_user_permission_description")
],
[
"index" => "user.remove",
"name" => __("auth.delete_user_permission_text"),
"description" => __("auth.delete_user_permission_description"),
"danger" => __("auth.delete_user_permission_danger")
],
[
"index" => "user.permission.assign",
"name" => __("auth.auth.assign_permissions_permission_text"),
"description" => __("auth.user_assign_permission_description"),
"danger" => __("auth.assign_permissions_danger_text")
],
]
]
)
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    @include(
"auth.role-permissions",
[
"user" => (isset($user) ? $user : null),
"role" => [
"index" => "ticket.admin",
"name" => __("ticket.tickets_admin_role_text"),
"description" => __("ticket.tickets_admin_role_description")
],
"permissions" => [
["index" => "ticket.add", "name" => __("ticket.add_ticket_permission_text"), "description" => __("ticket.add_ticket_permission_description")],
["index" => "ticket.edit", "name" => __("ticket.edit_ticket_permission_text"), "description" => __("ticket.edit_ticket_permission_description")],
["index" => "ticket.edit.content", "name" => __("ticket.edit_content_ticket_permission_text"), "description" => __("ticket.edit_content_ticket_permission_description"), "danger" => __("ticket.edit_content_ticket_permission_danger")],
["index" => "ticket.remove", "name" => __("ticket.delete_ticket_permission_text"), "description" => __("ticket.delete_ticket_permission_description")],
["index" => "ticket.answer", "name" => __("ticket.answer_ticket_text"), "description" => __("ticket.answer_ticket_permission_description")],
]
]
)
                </div>
            </div>
        </div>
    </div>
@endcan
