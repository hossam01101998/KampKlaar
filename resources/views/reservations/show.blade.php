@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Reservation Details</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Reservation #{{ $reservation->reservation_id }}</h3>
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $reservation->user->username }} (ID: {{ $reservation->user->user_id }})</p>
            <p><strong>Item:</strong> {{ $reservation->item->name }} (ID: {{ $reservation->item->item_id }})</p>
            <p><strong>Quantity Reserved:</strong> {{ $reservation->quantity }}</p>
            <p><strong>Start Date:</strong> {{ $reservation->start_date }}</p>
            <p><strong>End Date:</strong> {{ $reservation->end_date }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status? 'Confirmed' : 'Cancelled' ) }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to Reservations List</a>
        </div>
    </div>
</div>

@endsection
