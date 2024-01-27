@extends('users::layouts.sub')

@section('users-title')
    Users
@endsection

@section('users-content')
    <div class="container">
        <div class="row">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif
            <h1>Users:</h1>
            @foreach($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">name: {{ $user->full_name }}</h5>
                            <p class="card-text">E-mail: {{ $user->email }}</p>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
