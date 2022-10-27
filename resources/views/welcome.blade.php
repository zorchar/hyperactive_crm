<x-layout>
    <div class="test">
        This is the welcome main
        @unless(count($students) == 0)

            @foreach ($students as $student)
                <div>
                    <a href="/students/{{ $student['id'] }}">{{ $student['id'] }}</a>
                </div>
            @endforeach
        @else
            <p>No student found</p>
        @endunless

        <a href="/students/create">Create Student</a>
    </div>
</x-layout>
