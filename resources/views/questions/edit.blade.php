<x-layout>
    edit question page

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

        <button>Submit</button>

    </form>
</x-layout>
