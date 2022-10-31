<x-layout>
    create student page

    <form method="POST" action="/students">
        @csrf

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}">
        </div>

        @error('first_name')
            {{ $message }}
        @enderror

        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}">
        </div>

        @error('last_name')
            {{ $message }}
        @enderror

        <div>
            <label for="national_id">National ID:</label>
            <input type="text" name="national_id" value="{{ old('national_id') }}">
        </div>

        @error('national_id')
            {{ $message }}
        @enderror

        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        @error('email')
            {{ $message }}
        @enderror

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>

        @error('password')
            {{ $message }}
        @enderror

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation">
        </div>

        @error('password_confirmation')
            {{ $message }}
        @enderror


        <div>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        @error('phone')
            {{ $message }}
        @enderror

        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ old('address') }}">
        </div>

        @error('address')
            {{ $message }}
        @enderror

        <div>
            <label for="curriculum">Curriculum:</label>
            <input type="text" name="curriculum" value="{{ old('curriculum') }}">
        </div>

        @error('curriculum')
            {{ $message }}
        @enderror

        <div>
            <label for="starting_date">Starting Date:</label>
            <input type="date" name="starting_date" value="{{ old('starting_date') }}">
        </div>

        @error('starting_date')
            {{ $message }}
        @enderror

        <button>Create Student</button>

    </form>
</x-layout>
