<x-layout>
    <form method="POST" action={{ '/students/' . $id . '/study_days' }}>
        @csrf

        @for ($i = 1; $i <= 6; $i++)
            <div>
                Sunday
            </div>

            <div>
                @if ($daysOfWeek[$i])
                    <input type="checkbox" name={{ 'checkbox' . $i }} checked />
                @else
                    <input type="checkbox" name={{ 'checkbox' . $i }} />
                @endif
            </div>

            <div>
                <label for={{ 'start_time' . $i }}>Start Time:</label>
                @if ($daysOfWeek[$i])
                    <input type="time" name={{ 'start_time' . $i }} value={{ $daysOfWeek[$i]['start_time'] }}>
                @else
                    <input type="time" name={{ 'start_time' . $i }}>
                @endif
            </div>

            @error('start_time' . $i)
                {{ $message }}
            @enderror

            <div>
                <label for={{ 'end_time' . $i }}>End Time:</label>
                @if ($daysOfWeek[$i])
                    <input type="time" name={{ 'end_time' . $i }} value={{ $daysOfWeek[$i]['end_time'] }}>
                @else
                    <input type="time" name={{ 'end_time' . $i }}>
                @endif
            </div>

            @error('end_time' . $i)
                {{ $message }}
            @enderror

            <div>
                @if ($daysOfWeek[$i] && $daysOfWeek[$i]['is_remote'])
                    <input type="checkbox" name={{ 'is_remote' . $i }} checked />
                @else
                    <input type="checkbox" name={{ 'is_remote' . $i }} />
                @endif
            </div>
        @endfor

        <button>Submit</button>

    </form>
</x-layout>
