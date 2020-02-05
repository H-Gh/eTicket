<div class="role-permissions-container">
    <div class="role">
        <label for="{{ $role["index"] }}">{{ $role["name"] }}</label>
        <input
                type="checkbox"
                id="{{ $role["index"] }}"
                name="roles[{{ $role["index"] }}]"
                value="{{ $role["index"] }}"
                class="stroke"
                @if (old($role["index"]) === "on" || !empty($user) && $user->hasRole($role["index"]))
                checked="checked"
                @endif
        />
        <div class="description">{{ $role["description"] }}</div>
    </div>
    <ul class="permissions">
        @foreach($permissions as $permission)
            <li>
                <label for="{{ $permission["index"] }}">{{ $permission["name"] }}</label>
                <input
                        type="checkbox"
                        id="{{ $permission["index"] }}"
                        name="permissions[{{ $permission["index"] }}]"
                        value="{{ $permission["index"] }}"
                        class="stroke"
                        @if (old($permission["index"]) === "on" || !empty($user) && $user->hasPermissionTo($permission["index"]))
                        checked="checked"
                        @endif
                />
                <div class="description">{{ $permission["description"] }}</div>
                @if(isset($permission["danger"]))
                    <div class="text danger">{{ $permission["danger"] }}</div>
                @endif
            </li>
        @endforeach
    </ul>
</div>