<x-layout>
    <div class="test">
        This is the student screen
        {{-- @unless($student == null) --}}

        {{-- @foreach ($student->getAttributes() as $key => $value)
                <div>
                    {{ $key . ': ' . $value }}
                </div>
            @endforeach --}}

        <div>
            Name: {{ $student->first_name . ' ' . $student->last_name }}
        </div>

        @if (auth()->user()->role > 1 && $student->role == 1)
            @if ($status)
                Latest status:
                <a href={{ '/students/' . $student['id'] . '/statuses' }}>
                    <x-status.status :status='$status' />
                </a>
            @else
                <div>No statuses found</div>
            @endif
            <a href={{ '/students/' . $student->id . '/statuses/create' }}>New Status</a>
            <br />
        @endif

        @if ($student->role == 1)
            @if ($question)
                Latest question:
                <a href={{ '/students/' . $student['id'] . '/questions' }}>
                    <x-question.question :question='$question' />
                </a>
            @else
                <div>No questions found</div>
            @endif

            {{-- @if (auth()->id() == $student['id'])
                <a href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
            @endif --}}
        @endif
        {{-- @else
            <p>No student found</p>
        @endunless --}}
    </div>
</x-layout>
