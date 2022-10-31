    <x-layout>

        @include('searchBarScript')

        <input id="search" oninput="searchBarOnInputHandler(this)">
        <div id='auto-complete'></div>
        <div class="test">
            This is the welcome main
            @unless(count($students) == 0)
                @foreach ($students as $student)
                    @if ($student->id === auth()->id() || auth()->user()?->role > 1)
                        <div>
                            <a
                                href="/students/{{ $student['id'] }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                        </div>
                        <div>
                            {{ $student['curriculum'] }}
                        </div>
                        <div>
                            {{ $student['updated_at'] }}
                        </div>
                    @endif
                @endforeach
            @else
                <p>No students found</p>
            @endunless

            <a href="/students/create">Create Student</a>
            <a href="/students/report">Get students report</a>
        </div>
    </x-layout>
