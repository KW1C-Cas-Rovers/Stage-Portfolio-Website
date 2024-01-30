@extends('pages::layouts.sub')

@section('pages-content')
    <h1>Hello World</h1>

    <p>Module: {!! config('pages.name') !!}</p>
@endsection
