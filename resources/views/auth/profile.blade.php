@extends("layouts.frontend")
@section("css")
    <link href="{{ asset("css/profile.css") }}" rel="stylesheet"/>
@endsection
@section("js")
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <form method="POST" action="{{ route("profile.update", ["user" => request("user")]) }}">
                    @csrf
                    <div class="title">{{ __("auth.Profile") }}</div>
                    <div class="content">
                        <div class="container-fluid" style="display: flex">
                            <div class="row" style="width: 100%; margin: 0">
                                <div class="col">
                                    <div class="section">
                                        {{ __("auth.Basic information") }}
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __("auth.Email address") }}</label>
                                        <input type="text" id="email" placeholder="{{ $user->email }}"
                                               readonly="readonly"
                                               disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __("common.Name") }}</label>
                                        <input type="text" id="name" name="name" value="{{ $user->name }}"/>
                                        @error("name")
                                        <span class="text danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __("auth.Password") }}</label>
                                        <input type="password" id="password" name="password"/>
                                        @error("password")
                                        <span class="text danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">{{ __("auth.Password confirm") }}</label>
                                        <input type="password" id="password_confirmation"
                                               name="password_confirmation"/>
                                        @error("password_confirmation")
                                        <span class="text danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
                        "user" => $user,
                        "role" => [
                            "index" => "user.admin",
                            "name" => __("auth.User admin"),
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
                        "user" => $user,
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
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="button primary">{{ __("common.Save") }}</button>
                    </div>
                </form>
            </div>
@endsection