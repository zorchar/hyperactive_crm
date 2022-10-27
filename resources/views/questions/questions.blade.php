<x-layout>
    {{ $student['first_name'] . ' ' . $student['last_name'] }}
    <br />
    @foreach ($questions as $question)
        {{-- @if (count($statuses) > 0) --}}
        <a href="/students/{{ $student['id'] }}/questions/{{ $question['id'] }}">
            <x-question.question :question='$question' />
        </a>
        {{-- @endif --}}
    @endforeach
    <a href={{ '/students/' . $student['id'] . '/questions/create' }}>New Question</a>
</x-layout>
