<x-layout>
    {{ $student['first_name'] . ' ' . $student['last_name'] }}
    @foreach ($studyDays as $studyDay)
        {{-- @if (count($statuses) > 0) --}}
        <x-study_day.study_day :studyDay='$studyDay' />
        {{-- @endif --}}
    @endforeach
    <a href={{ '/students/' . $student['id'] . '/study_days/create' }}>Edit Study Days</a>
</x-layout>
