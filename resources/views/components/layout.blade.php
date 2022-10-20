<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <x-flash-message />
    <nav>
        This is the nav bar
        <a href="/">Home</a>
    </nav>
    <main>
        {{-- @yield('content') --}}
        {{ $slot }}
    </main>
    <footer>
        This is the footer
    </footer>
</body>

</html>
