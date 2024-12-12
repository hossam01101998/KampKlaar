<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
            <p><strong>User:</strong> {{ $reservation->user->name }} (ID: {{ $reservation->user->user_id }})</p>
            <p><strong>Item:</strong> {{ $reservation->item->name }} (ID: {{ $reservation->item->item_id }})</p>
            <p><strong>Quantity Reserved:</strong> {{ $reservation->quantity }}</p>
            <p><strong>Start Date:</strong> {{ $reservation->start_date }}</p>
            <p><strong>End Date:</strong> {{ $reservation->end_date }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back to Reservations List</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
