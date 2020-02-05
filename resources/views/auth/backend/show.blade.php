@extends("layouts.backend")
@section("css")
    <link href="{{ asset("css/profile.css") }}" rel="stylesheet"/>
@endsection
@section("js")
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("auth.User #:number", ["number" => $user->id])])
        @include("notifications")
        <div class="main-content">
            <div class="action-buttons-container">
                @can("user.edit")
                    <a class="button primary" href="{{ route("admin.user.edit", ["user" => $user->id]) }}">
                        {{ __("auth.Edit user") }}
                    </a>
                @endcan
                @can("user.remove")
                    <a class="button danger" href="{{ route("admin.user.destroy", ["user" => $user->id]) }}">
                        {{ __("auth.Remove user") }}
                    </a>
                @endcan
            </div>
            <div class="box rounded">
                <div class="content">
                    <div class="table-responsive">
                        <table class="table-striped data-table">
                            <tr>
                                <td>{{ __("auth.Email address") }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("auth.Name") }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("auth.Roles") }}</td>
                                <td>
                                    {{
                                        implode(" - ", $user->roles->map(function($role, $key) {
                                            return \App\Facades\PermissionManager::getTranslatedName($role->name);
                                        })->toArray())
                                     }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("auth.Permissions") }}</td>
                                <td>
                                    {{
                                        implode(" - ", $user->permissions->map(function($permission, $key) {
                                            return \App\Facades\PermissionManager::getTranslatedName($permission->name);
                                        })->toArray())
                                     }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("common.Created at") }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("common.Updated at") }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection