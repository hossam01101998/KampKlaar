@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
    <h2>Reservation Details</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

            <h3>Reservation #{{ $reservation->reservation_id }}</h3>
        </div>
        <div class="card-body">

            @if($reservation->item->photo)

                 <img src="{{ asset($reservation->item->photo) }}" alt="{{$reservation->item->name}}" class="img-fluid" style="max-width: 350px; max-height:500px; object-fit: cover; border-radius: 10px;">
                 <br>
                 <br>
            @endif

            <p><strong>User:</strong> {{ $reservation->user->username }} (ID: {{ $reservation->user->user_id }})</p>
            <p><strong>Item:</strong> {{ $reservation->item->name }} (ID: {{ $reservation->item->item_id }})</p>
            <p><strong>Quantity Reserved:</strong> {{ $reservation->quantity }}</p>
            <p><strong>Start Date:</strong> {{ $reservation->start_date }}</p>
            <p><strong>End Date:</strong> {{ $reservation->end_date }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status? 'Confirmed' : 'Cancelled' ) }}</p>
        </div>

        @if(auth()->user()->isadmin || auth()->user()->user_id === $reservation->user_id)
        <div class="mb-3" style="padding: 1%">

            @if ($reservation->status)
                <a href="{{ route('reservations.edit', $reservation->reservation_id) }}" class="btn btn-warning btn-sm">Edit</a>
            @endif

            <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
        @endif

        <div class="card-footer">
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to Reservations List</a>
        </div>
    </div>
</div>

@endsection
