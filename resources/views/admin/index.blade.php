@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                @if (!$user->isAdmin())
                    <form action="{{ route('admin.make', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit">Make Admin</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
