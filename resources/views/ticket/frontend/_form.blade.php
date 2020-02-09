<form action="{{ route("ticket.store") }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="ticket-title">{{ __("common.title_text") }}</label>
        <input id="ticket-title" type="text" name="title" value="{{ old("title") }}"/>
        @error("title")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="ticket-text">{{ __("common.text_text") }}</label>
        <textarea name="text" id="ticket-text">{{ old("text") }}</textarea>
        @error("text")
        <span class="text danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="submit-button-container">
        <button type="submit" class="button primary">{{ __("common.send_text") }}</button>
    </div>
</form>