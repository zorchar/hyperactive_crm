<x-layout>
    <div class="test">
        This is the student screen
        @unless($student == null)
            @foreach ($student->getAttributes() as $key => $value)
                <div>
                    {{ $key . ': ' . $value }}
                </div>
            @endforeach

            @if ($status)
                <a href={{ '/students/' . $student['id'] . '/statuses' }}>
                    <x-status.status :status='$status' />
                </a>
            @else
                <div>No statuses found</div>
            @endif

            <a href={{ '/students/' . $student->id . '/statuses/create' }}>New Status</a>

            @if ($question)
                <a href={{ '/students/' . $student['id'] . '/questions' }}>
                    <x-question.question :question='$question' />
                </a>
            @else
                <div>No questions found</div>
            @endif

            <a href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
        @else
            <p>No student found</p>
        @endunless
    </div>
</x-layout>
