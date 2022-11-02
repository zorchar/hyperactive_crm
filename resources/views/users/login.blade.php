<x-layout>
    <form action="/authenticate" method="POST" class="elements-container">
        @csrf

        <div class="element-container">
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}" class="input">
        </div>

        @error('email')
            {{ $message }}
        @enderror

        <div class="element-container">
            <label for="password">Password:</label>
            <input type="password" name="password" value="{{ old('password') }}" class="input">
        </div>

        @error('password')
            {{ $message }}
        @enderror

        <button class="login-button">Login</button>
    </form>
</x-layout>
