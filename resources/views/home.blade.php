@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! Welcome ') }} {{ Auth::user()->username }}!


                    <br>






                <div class="container mt-4">
                    @foreach ($users as $user)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>{{ $user->user_id }}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Email: </strong> {{ $user->email }}</p>

                                @if (auth()->check())
                                    <p><strong>Username: </strong>{{$user->username }}</p>

                                    @if ($user->role != 'Admin')
                                        <form action="{{ route('admin.make', ['user_id' => $user->user_id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Make Admin</button>
                                        </form>
                                    @endif
                                @else
                                    <p>You are not logged in.</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>









                </div>
            </div>
        </div>
    </div>
</div>




@endsection
