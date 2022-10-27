<x-layout>
    create question page

    <form method="POST" action={{ '/students/' . $studentId . '/questions' }}>
        @csrf

        <div>
            <label for="question">Write your question here in the textbox below:</label>
            <br />
            <textarea name="question">{{ old('question') }}</textarea>
        </div>

        @error('question')
            {{ $message }}
        @enderror

        <button>Submit</button>

    </form>
</x-layout>
