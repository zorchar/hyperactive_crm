<x-layout>

    <div class="name">
        {{ $student['first_name'] . ' ' . $student['last_name'] }}
    </div>

    <div class="table">

        <div class="table-row first">
            <div>
                Time of entry
            </div>
            <div>
                Approved
            </div>
            <div>
                Approved by
            </div>
        </div>


        @if (!$attendances->isEmpty())
            @foreach ($attendances as $attendance)
                <x-attendance.attendance :attendance='$attendance' />
            @endforeach
        @else
            <div>No attendances for user</div>
        @endif
    </div>
    {{-- <a href={{ '/students/' . $student['id'] . '/attendances/create' }}>New Attendance</a> --}}

</x-layout>
