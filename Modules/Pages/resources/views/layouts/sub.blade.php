@extends('core::layouts.master')

@section('title')
    @yield('pages-title', 'User Module')
@endsection

@section('module-head')
    <link rel="stylesheet" href="{{ mix('Modules/Pages/css/app.css') }}">
@endsection

@section('content')
    @yield('pages-content')
@endsection

@section('module-scripts')
    <script type="text/javascript" src="{{ mix('Modules/Pages/js/app.js') }}"></script>
@endsection
