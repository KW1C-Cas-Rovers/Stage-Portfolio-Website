@extends('pages::layouts.sub')

@section('pages-content')
    <div class="container">
        <h1>All Pages</h1>
        <div class="row">
            <div class="w-100 d-flex justify-content-end">
                <a class="text-end btn btn-primary d-inline-block" href="{{ route('pages.create') }}">Page +</a>
            </div>
            @if ($pages->isEmpty())
                <p>No pages found.</p>
            @else
                @foreach($pages as $page)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Title:</strong> {{ $page->title }}
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Slug:</strong> {{ $page->slug }}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('pages.show', $page->id) }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-success">Edit</a>
                                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
