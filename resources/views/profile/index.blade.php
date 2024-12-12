@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>User Profile</h2>

    <div class="mb-3">
        <strong>Username:</strong> {{ $user->username }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $user->email }}
    </div>
    <div class="mb-3">
        <strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}
    </div>

    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>
</div>
@endsection
