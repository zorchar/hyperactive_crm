<x-layout>
    <div class="name">
        {{ $student['first_name'] . ' ' . $student['last_name'] }}
    </div>

    <br />
    <div class="table-name">Questions</div>
    @if ($questions->count() > 0)
        <div class="table">
            <div class="table-row first">
                <div>
                    Question
                </div>
                <div>
                    Answer
                </div>
                <div>
                    Answered By
                </div>
            </div>
            @foreach ($questions as $question)
                <a class="table-row" href={{ '/students/' . $question->student_id . '/questions/' . $question->id }}>
                    <x-question.question :question='$question' />
                </a>
            @endforeach
        </div>
    @else
        <div class="table-name frame">No quesitons found</div>
    @endif
    @if (auth()->user()->role == 1)
        <div>
            <a class="login-button" href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
        </div>
    @endif
</x-layout>
