<div class="table-responsive">
    <table class="data-table users-list">
        <thead>
        <tr>
            <th>{{ __("common.id_text") }}</th>
            <th>{{ __("common.name_text") }}</th>
            <th>{{ __("auth.email_address_text") }}</th>
            <th>{{ __("common.created_at_text") }}</th>
            <th>{{ __("common.updated_at_text") }}</th>
            <th>{{ __("common.options_text") }}</th>
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
                           onclick="confirm('{{ __("common.are_you_sure_text") }}');
                                   document.getElementById('user-{{ $user->id }}-remove-form').submit();"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="user-{{ $user->id }}-remove-form"
                              action="{{ route("admin.user.destroy", ["user" => $user->id]) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __("common.no_data_text") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $users->links() }}