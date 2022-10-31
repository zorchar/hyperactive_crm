<x-layout>
    edit question page
    <br />
    @if (auth()->id() == $studentId)
        <form method="POST" action={{ '/students/' . $studentId . '/questions/' . $question->id }}>
            @csrf
            @method('PUT')

            <div>
                <label for="question">Edit your question in the textbox below:</label>
                <br />
                <textarea name="question">{{ $question->question }}</textarea>
            </div>

            @error('question')
                {{ $message }}
            @enderror

            <button>Edit</button>

        </form>
        @if ($question->teacher_remark)
            <div>The answer is: {{ $question->teacher_remark }}</div>
            <div>Answered by: {{ $User::find($question->updated_by)->first_name }}</div>
        @else
            <div>You haven't gotten an answer yet</div>
        @endif
    @elseif(auth()->user()?->role > 1)
        The question is: {{ $question->question }}

        <form method="POST" action={{ '/students/' . $studentId . '/questions/' . $question->id }}>
            @csrf
            @method('PUT')

            <div>
                <label for="teacher_remark">Edit your answer in the textbox below:</label>
                <br />
                <textarea name="teacher_remark">{{ $question->teacher_remark }}</textarea>
            </div>

            @error('teacher_remark')
                {{ $message }}
            @enderror

            <button>Submit</button>

        </form>
    @else
        <br />
        Unauthorized
    @endif
</x-layout>
