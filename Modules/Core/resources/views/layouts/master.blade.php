@php
/**
 * Authors: Cas Rovers
 * Date:    1-26-2024
 * File:    master.blade.php
 **/
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') | Admin</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ mix('Modules/Core/css/app.css') }}">
    {{-- Module CSS --}}
    @yield('module-head')
</head>
<body>
@include('core::partials.navigation')
    <main class="py-4">
        @yield('content')
    </main>

    {{-- Scripts --}}
    <script type="text/javascript" src="{{ mix('Modules/Core/js/app.js') }}"></script>
    {{-- Module Scripts --}}
    @yield('module-scripts')
</body>
</html>
