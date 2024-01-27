@extends('users::layouts.sub')

@section('users-title')
    Edit {{ $user->full_name }}
@endsection

@section('users-content')
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
            </div>

            <!-- Preposition -->
            <div class="mb-3">
                <label for="preposition" class="form-label">{{ __('Preposition') }}</label>
                <input type="text" class="form-control" id="preposition" name="preposition" value="{{ $user->preposition }}">
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role" class="form-label">{{ __('Role') }}</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}">
            </div>

            <!-- Bio -->
            <div class="mb-3">
                <label for="bio" class="form-label">{{ __('Bio') }}</label>
                <textarea id="bio" class="form-control" name="bio">{{ $user->bio }}</textarea>
            </div>

            <!-- Website -->
            <div class="mb-3">
                <label for="website" class="form-label">{{ __('Website') }}</label>
                <input type="text" class="form-control" id="website" name="website" value="{{ $user->website }}">
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>

        <hr>

        <h2>Update Password</h2>

        <!-- Password Update Form -->
        <form method="POST" action="{{ route('users.updatePassword', $user->id) }}">
{{--            --}}
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" class="form-control border border-danger focus-ring focus-ring-danger" id="current_password" name="current_password">
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control border border-danger focus-ring focus-ring-danger" id="new_password" name="new_password">
            </div>

            <!-- Confirm New Password -->
            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control border border-danger focus-ring focus-ring-danger" id="new_password_confirmation" name="new_password_confirmation">
            </div>

            @error('current_password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('new_password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('new_password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-danger">Update Password</button>
        </form>
    </div>
@endsection
