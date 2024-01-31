@extends('pages::layouts.sub')

@section('pages-content')
    <h1>{{ $page->title }}</h1>
    <p>Slug: {{ $page->slug }}</p>
    <p>Content: {{ $page->content }}</p>
    <p>Category: {{ $page->category->name }}</p>
    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
