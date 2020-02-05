<div class="col">
    <div class="section">
        {{ __("auth.Basic information") }}
    </div>
    <div class="form-group">
        <label for="email">{{ __("auth.Email address") }}</label>
        <input type="text" id="email" value="{{ old("email", isset($user) ? $user->email : null) }}"
               readonly="readonly"
               @if((isset($enableEmail) && !$enableEmail) || !isset($enableEmail))
               disabled
                @endif
        />
    </div>
    <div class="form-group">
        <label for="name">{{ __("common.Name") }}</label>
        <input type="text" id="name" name="name" value="{{ old("name", isset($user) ? $user->name : null) }}"/>
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