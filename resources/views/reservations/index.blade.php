@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Reservations List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>

    @endif


    <!-- search -->
    <form action="{{ route('reservations.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search reservations..." value="{{ old('search', $search ?? '') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>


    <form action="{{ route('reservations.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="sort_by" class="form-select" onchange="this.form.submit()">
                    <option value="reservation_id" {{ $sortBy == 'reservation_id' ? 'selected' : '' }}>ID</option>
                    <option value="user_id" {{ $sortBy == 'user_id' ? 'selected' : '' }}>User</option>
                    <option value="item_id" {{ $sortBy == 'item_id' ? 'selected' : '' }}>Item</option>
                    <option value="start_date" {{ $sortBy == 'start_date' ? 'selected' : '' }}>Start Date</option>
                    <option value="end_date" {{ $sortBy == 'end_date' ? 'selected' : '' }}>End Date</option>
                    <option value="quantity" {{ $sortBy == 'quantity' ? 'selected' : '' }}>Quantity</option>
                    <option value="status" {{ $sortBy == 'status' ? 'selected' : '' }}>Status</option>
                </select>
            </div>

            <div class="col-md-4">
                <select name="direction" class="form-select" onchange="this.form.submit()">
                    <option value="asc" {{ $direction == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $direction == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>


            <div class="col-md-4">
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All</option>
                    <option value="1" {{ $status === '1' ? 'selected' : '' }}>Confirmed</option>
                    <option value="0" {{ $status === '0' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>

                <th><a href="{{ route('reservations.index', ['sort_by' => 'reservation_id', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">ID</a></th>
                <th><a href="{{ route('reservations.index', ['sort_by' => 'username', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">User</a></th>
                <th><a href="{{ route('reservations.index', ['sort_by' => 'item_name', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Item</a></th>
                <th><a href="{{ route('reservations.index', ['sort_by' => 'start_date', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Start Date</a></th>
                <th><a href="{{ route('reservations.index', ['sort_by' => 'end_date', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">End Date</a></th>
                <th><a href="{{ route('reservations.index', ['sort_by' => 'quantity', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Quantity</a></th>
                <th>Status</th>

                <th>Actions</th>

            </tr>
        </thead>
        <tbody>

            @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->reservation_id }}</td>
                    <td>{{ $reservation->user->username }}</td>
                    <td>{{ $reservation->item->name }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->quantity }}</td>



                    <td>
                        @if ($reservation->status)
                            <span class="badge bg-success">Confirmed</span>
                        @else
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </td>


                    <td>
                        <a href="{{ route('reservations.show', $reservation->reservation_id) }}" class="btn btn-info btn-sm">View</a>
                        @if ($reservation->status)
                        <a href="{{ route('reservations.edit', $reservation->reservation_id) }}" class="btn btn-warning btn-sm">Edit</a>


                        @endif

                        <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No reservations found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
