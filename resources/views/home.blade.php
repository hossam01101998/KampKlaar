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
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('items.index') }}" class="btn btn-primary btn-block">
                View Items
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('reservations.index') }}" class="btn btn-success btn-block">
                View Reservations
            </a>
        </div>
        <div class="col-md-4">
          <a href="{{ route('reservations.index') }}" class="btn btn-danger btn-block">
                View Damage Reports
            </a>
        </div>
    </div>
</div>

@endsection
