    <form class="table-row" method="POST"
        action="/students/{{ $attendance['user_id'] }}/attendances/{{ $attendance['id'] }}">
        @csrf
        @method('PUT')



        <div class="flexbox">
            <input name="approved_time_of_entry" type="datetime-local" step="1"
                value="{{ $attendance['approved_time_of_entry'] ? $attendance['approved_time_of_entry'] : $attendance['created_at'] }}">

            @error('approved_time_of_entry')
                {{ 'The time of entry field is required' }}
            @enderror
        </div>

        <div class="approved">
            <input type="checkbox" name="is_approved" id="is_approved" {{ $attendance['approved_by'] ? 'checked' : '' }}>
            <button>Change</button>
        </div>

        <div>
            @if ($user = App\Models\User::find($attendance['approved_by']))
                {{ $user->first_name . ' ' . $user->last_name }}
            @else
                Not Approved
            @endif
        </div>

    </form>
