<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title', 'Projects')</title>

</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
            @include('partials.session-status')
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{config('app.name')}} | {{date('Y')}} ©
        </footer>
    </div>
</body>
</html>
