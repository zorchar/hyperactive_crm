<div>
    <form method="POST" action="/students/{{ $attendance['user_id'] }}/attendances/{{ $attendance['id'] }}">
        @csrf
        @method('PUT')

        <label for="approved_time_of_entry">Time of entry:</label>
        <input name="approved_time_of_entry" type="datetime-local" step="1"
            value="{{ $attendance['approved_time_of_entry'] ? $attendance['approved_time_of_entry'] : $attendance['created_at'] }}">
        <input type="checkbox" name="is_approved" id="is_approved" {{ $attendance['approved_by'] ? 'checked' : '' }}>

        @error('approved_time_of_entry')
            {{ 'The time of entry field is required' }}
        @enderror

        <button>Change</button>
    </form>
    {{ $user = App\Models\User::find($attendance['approved_by'])?->first_name }}
</div>
