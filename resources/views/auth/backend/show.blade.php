@extends("layouts.backend")
@section("css")
    <link href="{{ asset("css/profile.css") }}" rel="stylesheet"/>
@endsection
@section("js")
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("auth.user_with_number_text", ["number" => $user->id])])
        @include("notifications")
        <div class="main-content">
            <div class="action-buttons-container">
                @can("user.edit")
                    <a class="button primary" href="{{ route("admin.user.edit", ["user" => $user->id]) }}">
                        {{ __("auth.edit_user_permission_text") }}
                    </a>
                @endcan
                @can("user.remove")
                    <a class="button danger" href="#"
                       onclick="confirm('{{ __("common.are_you_sure_text") }}');
                               document.getElementById('user-{{ $user->id }}-remove-form').submit();">
                        {{ __("auth.remove_user_text") }}
                    </a>

                        <form id="user-{{ $user->id }}-remove-form"
                              action="{{ route("admin.user.destroy", ["user" => $user->id]) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                @endcan
            </div>
            <div class="box rounded">
                <div class="content">
                    <div class="table-responsive">
                        <table class="table-striped data-table">
                            <tr>
                                <td>{{ __("auth.email_address_text") }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("common.name_text") }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("auth.roles_text") }}</td>
                                <td>
                                    {{
                                        implode(" - ", $user->roles->map(function($role, $key) {
                                            return \App\Facades\PermissionManager::getTranslatedName($role->name);
                                        })->toArray())
                                     }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("auth.permissions_text") }}</td>
                                <td>
                                    {{
                                        implode(" - ", $user->permissions->map(function($permission, $key) {
                                            return \App\Facades\PermissionManager::getTranslatedName($permission->name);
                                        })->toArray())
                                     }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("common.created_at_text") }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            <tr>
                                <td>{{ __("common.updated_at_text") }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection