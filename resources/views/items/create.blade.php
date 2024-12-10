<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create article</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Create new article</h2>


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


    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name of the object</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-3">
            <label for="youth_movement" class="form-label">Youth Movement</label>
            <input type="text" name="youth_movement" id="youth_movement" class="form-control" value="{{ old('youth_movement') }}" required>
        </div>

        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" name="place" id="place" class="form-control" value="{{ old('place') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
