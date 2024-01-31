@php
/**
 * Authors: Cas Rovers
 * Date:    1-25-2024
 * File:    master.blade.php
 **/
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home') | Cas Rovers</title>

    {{-- OpenGraph Meta Tags --}}
    <meta property="og:title" content="@yield('title', 'Home') | Cas Rovers">
    <meta property="og:description" content="Cas Rovers a Software Developer based in the Netherlands, specializing in PHP, Laravel, JavaScript and mutch more">
    <meta property="og:image" content="image_path">
    <meta property="og:url" content="url">
    <meta property="og:type" content="profile">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- Profile Meta Tags --}}
    <meta property="profile:first_name" content="Cas">
    <meta property="profile:last_name" content="Rovers">
    <meta property="profile:username" content="cas-rovers">
    <meta property="profile:gender" content="male">
    {{-- Meta Tags --}}
    <meta property="description" content="Cas Rovers a Software Developer based in the Netherlands, specializing in PHP, Laravel, JavaScript and mutch more">
    <meta property="keywords" content="Cas Rovers, Software Developer, PHP, Laravel, JavaScript, HTML, CSS, Netherlands">
    <meta property="author" content="Cas Rovers">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
</head>
<body>
    @include('partials.navigation')

    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ mix('assets/js/app.js') }}"></script>
</body>
</html>
