<div class="col">
    <div class="section">
        {{ __("auth.basic_information_text") }}
    </div>
    <div class="form-group">
        <label for="email">{{ __("auth.email_address_text") }}</label>
        <input type="text" id="email" name="email" value="{{ old("email", isset($user) ? $user->email : null) }}"
               @if((isset($enableEmail) && !$enableEmail) || !isset($enableEmail))
               readonly="readonly"
               disabled
                @endif
        />
    </div>
    <div class="form-group">
        <label for="name">{{ __("common.name_text") }}</label>
        <input type="text" id="name" name="name" value="{{ old("name", isset($user) ? $user->name : null) }}"/>
        @error("name")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">{{ __("auth.password_text") }}</label>
        <input type="password" id="password" name="password"/>
        @error("password")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">{{ __("auth.password_text confirm") }}</label>
        <input type="password" id="password_confirmation"
               name="password_confirmation"/>
        @error("password_confirmation")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
</div>