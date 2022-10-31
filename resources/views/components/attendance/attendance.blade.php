<div>
    <form method="POST" action="/students/{{ $attendance['user_id'] }}/attendances/{{ $attendance['id'] }}">
        @csrf
        @method('PUT')

        <input name="approved_time_of_entry" type="datetime-local"
            value="{{ $attendance['approved_time_of_entry'] ? $attendance['approved_time_of_entry'] : $attendance['created_at'] }}">
        <input type="checkbox" name="is_approved" id="is_approved" {{ $attendance['approved_by'] ? 'checked' : '' }}>
        <button>Change</button>
    </form>
    {{ $user = App\Models\User::find($attendance['approved_by'])?->first_name }}
</div>
