@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Edit Reservation</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div>
    @endif

    <form action="{{ route('reservations.update', $reservation->reservation_id) }}" method="POST">
        @csrf
        @method('PUT')


        <input type="hidden" name="user_id" value="{{ $reservation->user_id }}">
        <input type="hidden" name="item_id" value="{{ $reservation->item_id }}">

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $reservation->start_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $reservation->end_date) }}" required>
        </div>

        @php
       // dd($item);
        @endphp


    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $reservation->quantity) }}" required min="1">

        @if(isset($item))
            <small class="form-text">Available quantity: {{ $item->quantity }}</small>
        @else
            <small class="form-text">Item not found.</small>
        @endif
    </div>




       <!-- only admin -->
         @if(auth()->user()->isadmin)

       <div class="mb-3">
           <label for="status" class="form-label">Status</label>
           <select name="status" id="status" class="form-control">
               <option value="1" {{ $reservation->status == true ? 'selected' : '' }}>Confirmed</option>
               <option value="0" {{ $reservation->status == false ? 'selected' : '' }}>Canceled</option>
           </select>
       </div>
       @else
       <input type="hidden" name="status" value="1">
       @endif


        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>

@endsection
