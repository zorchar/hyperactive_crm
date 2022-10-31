<x-layout>
    <form action="/authenticate" method="POST">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        @error('email')
            {{ $message }}
        @enderror

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" value="{{ old('password') }}">
        </div>

        @error('password')
            {{ $message }}
        @enderror

        <button>Login</button>
    </form>
</x-layout>
