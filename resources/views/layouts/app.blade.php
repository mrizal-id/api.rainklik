<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO meta tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="author" content="{{ config('app.name', 'RainKlik') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" id="google-font">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/theme-switcher.js"></script>
    <link rel="stylesheet" href="/icons/icons.min.css">

</head>

<body>
    <div id="app">
        @include('partials.header')
        <main class="page-wrapper">
            @yield('content')
        </main>
    </div>
</body>

</html>
