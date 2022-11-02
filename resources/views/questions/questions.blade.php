<x-layout>
    {{ $student['first_name'] . ' ' . $student['last_name'] }}
    <br />
    @foreach ($questions as $question)
        <a href="/students/{{ $student['id'] }}/questions/{{ $question['id'] }}">
            <x-question.question :question='$question' />
        </a>
    @endforeach
    @if (auth()->user()->role == 1)
        <a href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
    @endif
</x-layout>
