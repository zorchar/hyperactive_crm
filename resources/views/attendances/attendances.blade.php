<x-layout>

    <div>
        {{ $student['first_name'] . ' ' . $student['last_name'] }}
    </div>

    @foreach ($attendances as $attendance)
        <x-attendance.attendance :attendance='$attendance' />
    @endforeach

    {{-- <a href={{ '/students/' . $student['id'] . '/attendances/create' }}>New Attendance</a> --}}

</x-layout>
