@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Item Details</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>{{ $item->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $item->item_id }}</p>
            <p><strong>Name:</strong> {{ $item->name }}</p>
            <p><strong>Description:</strong> {{ $item->description }}</p>
            <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
            <p><strong>Place:</strong> {{ $item->place }}</p>
            <p><strong>Created At:</strong> {{ $item->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $item->updated_at }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('items.edit', $item->item_id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('items.destroy', $item->item_id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>



<br>
<br>


@auth

@if ($item->quantity > 0)
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
            <input type="hidden" name="item_id" value="{{ $item->item_id }}">

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity to Reserve</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" max="{{ $item->quantity }}" required>
                <small class="form-text text-muted">Max quantity available: {{ $item->quantity }}</small>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date"
                       name="start_date"
                       id="start_date"
                       class="form-control"
                       value="{{ old('start_date', isset($reservation->start_date) ? $reservation->start_date : now()->format('Y-m-d')) }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date"
                       name="end_date"
                       id="end_date"
                       class="form-control"
                       value="{{ old('end_date', isset($reservation->end_date) ? $reservation->end_date : now()->format('Y-m-d')) }}"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Reserve</button>
        </form>
        @else
    <p class="text-danger">Sorry, this item is out of stock.</p>
@endif

    @else
        <p>Please <a href="{{ route('login') }}">login</a> to reserve this item.</p>
    @endauth
    </div>
</div>

@endsection
