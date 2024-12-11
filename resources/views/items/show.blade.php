<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
            <p><strong>Youth Movement:</strong> {{ $item->youth_movement }}</p>
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
    </div>
</div>


@auth
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
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reserve</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to reserve this item.</p>
    @endauth


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
