<div class="table-responsive">
    <table class="data-table users-list">
        <thead>
        <tr>
            <th>{{ __("common.ID") }}</th>
            <th>{{ __("auth.Name") }}</th>
            <th>{{ __("auth.Email address") }}</th>
            <th>{{ __("common.Created at") }}</th>
            <th>{{ __("common.Updated at") }}</th>
            <th>{{ __("common.Options") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td style="width: 10%">{{ $user->id }}</td>
                <td style="width: 30%">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td style="width: 10%" class="options">
                    <a href="{{ route("admin.user.show", ["user" => $user->id]) }}"><i class="fas fa-eye"></i></a>
                    @can("user.edit")
                        <a href="{{ route("admin.user.edit", ["user" => $user->id]) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endcan
                    @can("user.remove")
                        <a href="#"
                           onclick="event.preventDefault();
                                   document.getElementById('user-{{ $user->id }}-remove-form').submit();"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="user-{{ $user->id }}-remove-form"
                              action="{{ route("admin.user.destroy", ["user" => $user->id]) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __("common.There is no data yet.") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $users->links() }}