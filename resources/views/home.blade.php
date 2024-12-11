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

                    {{ __('You are logged in!') }}

                    


                    @foreach ($users as $user)


                        @if (auth()->check())
                            <p>Welcome, {{ auth()->user()->name }}!</p>
                            
                            @if (!$user->role === 'Admin')
                                {{ dd($user) }}
                            @endif
                        @else
                            <p>You are not logged in.</p>
                        @endif
                        {{ $user->name }} - {{ $user->email }}  

                        
                        
                        <?php/*
                        <form action="{{ route('admin.make', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Make Admin</button>
                        </form>*/?>
                        
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
