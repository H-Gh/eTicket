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