<!DOCTYPE html>
<html lang="en">

<head>
    @include('searchBarCellScript')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss'])
</head>

<body onclick="cellOnClickHandler()">

    <x-navbar />

    <x-flash-message />

    <main>
        {{-- @yield('content') --}}
        {{ $slot }}
    </main>

    <x-footer />
</body>

</html>
