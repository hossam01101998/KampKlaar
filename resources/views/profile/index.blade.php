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
        <strong>Phone:</strong> {{ $user->phone }}
    </div>
    <div class="mb-3">
        <strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}
    </div>
    <div class="mb-3">
        <strong>Role:</strong> {{ $user->isadmin ? 'Admin' : 'Leader' }}
    </div>
    <div class="mb-3">
        <strong>Youth Movement:</strong> {{ $user->youth_movement }}
    </div>
    


    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>


</div>

    <img src="https://images.vexels.com/content/137047/preview/user-profile-blue-icon-32113c.png">
@endsection
