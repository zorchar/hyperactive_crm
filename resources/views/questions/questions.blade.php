<x-layout>
    {{ $student['first_name'] . ' ' . $student['last_name'] }}
    <br />
    @foreach ($questions as $question)
        <a href="/students/{{ $student['id'] }}/questions/{{ $question['id'] }}">
            <x-question.question :question='$question' />
        </a>
    @endforeach
    @if (auth()->user()->role == 1)
        <div>
            <a class="login-button" href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
        </div>
    @endif
</x-layout>
