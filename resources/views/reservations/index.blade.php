<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Reservations List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>

    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Item</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>

            @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->reservation_id }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->item->name }}</td>
                    <td>{{ $reservation->start_date }}</td>
                    <td>{{ $reservation->end_date }}</td>
                    <td>{{ $reservation->quantity }}</td>

                    

                    <td>{{ $reservation->status ? 'Confirmed' : 'Cancelled' }}</td>


                    <td>
                        <a href="{{ route('reservations.show', $reservation->reservation_id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('reservations.edit', $reservation->reservation_id) }}" class="btn btn-warning btn-sm">Edit</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
