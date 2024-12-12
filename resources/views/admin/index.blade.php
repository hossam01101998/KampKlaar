
@extends('layouts.app')
@section('content')
    <h1>Admin Dashboard</h1>
    <ul>
        @foreach ($users as $user)
    {{ $user->name }} - {{ $user->email }}

    @if (auth()->check())
        <p>Welcome, {{ auth()->user()->name }}!</p>

        @if (!$user->role === 'admin')
            <form action="{{ route('admin.make', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Make Admin</button>
            </form>
        @endif
    @else
        <p>You are not logged in.</p>
    @endif
@endforeach
    </ul>
@endsection
