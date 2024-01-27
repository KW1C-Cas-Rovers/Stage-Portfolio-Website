@extends('core::layouts.master')

@section('title')
    @yield('users-title', 'User Module')
@endsection

@section('module-head')
    <link rel="stylesheet" href="{{ mix('Modules/Users/css/app.css') }}">
@endsection

@section('content')
    @yield('users-content')
@endsection

@section('module-scripts')
    <script type="text/javascript" src="{{ mix('Modules/Users/js/app.js') }}"></script>
@endsection
