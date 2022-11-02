<x-layout>

    <div>
        {{ $student['first_name'] . ' ' . $student['last_name'] }}
    </div>

    @if (!$attendances->isEmpty())
        @foreach ($attendances as $attendance)
            <x-attendance.attendance :attendance='$attendance' />
        @endforeach
    @else
        <div>No attendances for user</div>
    @endif
    {{-- <a href={{ '/students/' . $student['id'] . '/attendances/create' }}>New Attendance</a> --}}

</x-layout>
