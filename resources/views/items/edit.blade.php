@extends('layouts.app')

@section('content')

<div class="container mt-5">

    @auth

    @if (auth()->user()->isadmin)

    <h2>Edit Article</h2>



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

    <form action="{{ route('items.update', $item->item_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name of the object</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $item->quantity) }}" required>
        </div>



        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" name="place" id="place" class="form-control" value="{{ old('place', $item->place) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@else
<div class="alert alert-danger text-center">
    <h4 class="alert-heading">Access Restricted</h4>
    <p>You need to be an admin to edit an article.</p>




</div>

@endif


@endauth

@endsection
