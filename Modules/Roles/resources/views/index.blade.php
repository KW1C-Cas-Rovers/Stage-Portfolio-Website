@extends('roles::layouts.sub')

@section('roles-content')
    <h1>Hello World</h1>

    <p>Module: {!! config('roles.name') !!}</p>
@endsection
