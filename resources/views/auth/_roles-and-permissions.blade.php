@can("user.permission.assign")
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 roles-permissions-container">
        <div class="section">
            {{ __("auth.Roles and permissions") }}
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
"name" => __("auth.Users admin"),
"description" => __("auth.This role will handle any action of users.")
],
"permissions" => [
[
"index" => "user.add",
"name" => __("auth.Add user"),
"description" => __("auth.User can add a new user to system."),
],
[
"index" => "user.edit",
"name" => __("auth.Edit user"),
"description" => __("auth.User can edit an existing user of system.")
],
[
"index" => "user.remove",
"name" => __("auth.Delete user"),
"description" => __("auth.User can delete an existing user of system."),
"danger" => __("auth.Deleting a user will delete all its tickets.")
],
[
"index" => "user.permission.assign",
"name" => __("auth.Assign permissions"),
"description" => __("auth.User can assign roles or permissions to an existing user of system."),
"danger" => __("auth.User will be able to make others as admin of system.")
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
"name" => __("ticket.Tickets admin"),
"description" => __("ticket.This role will handle any action of tickets")
],
"permissions" => [
["index" => "ticket.add", "name" => __("ticket.Add ticket"), "description" => __("ticket.User can add a new ticket to system.")],
["index" => "ticket.edit", "name" => __("ticket.Edit ticket"), "description" => __("ticket.User can edit an existing ticket of system.")],
["index" => "ticket.edit.content", "name" => __("ticket.Edit ticket's content"), "description" => __("ticket.User can edit the title and content an existing ticket of system."), "danger" => __("ticket.User can change others' tickets title or text.")],
["index" => "ticket.remove", "name" => __("ticket.Delete ticket"), "description" => __("ticket.User can delete an existing ticket of system.")],
["index" => "ticket.answer", "name" => __("ticket.Answer ticket"), "description" => __("ticket.User can answer an existing ticket of system.")],
["index" => "ticket.assign", "name" => __("ticket.Assign answerer"), "description" => __("ticket.User can assign another user to answer an existing ticket of system.")],
]
]
)
                </div>
            </div>
        </div>
    </div>
@endcan
