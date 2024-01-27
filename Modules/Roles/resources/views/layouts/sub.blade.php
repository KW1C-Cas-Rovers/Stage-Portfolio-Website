@extends('core::layouts.master')

@section('title')
    @yield('roles-title', 'User Module')
@endsection

@section('module-head')
    <link rel="stylesheet" href="{{ mix('Modules/Roles/css/app.css') }}">
@endsection

@section('content')
    @yield('roles-content')
@endsection

@section('module-scripts')
    <script type="text/javascript" src="{{ mix('Modules/Roles/js/app.js') }}"></script>
@endsection
