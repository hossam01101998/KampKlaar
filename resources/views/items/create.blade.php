@extends('layouts.app')

@section('content')

<div class="container mt-5">

    @auth

@if (auth()->user()->isadmin)

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


    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" >
            @error('photo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" name="place" id="place" class="form-control" value="{{ old('place') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    @else
<div class="alert alert-danger text-center">
    <h4 class="alert-heading">Access Restricted</h4>
    <p>You need to be an admin to create an article.</p>



</div>

@endif

    @else
<div class="alert alert-danger text-center">
    <h4 class="alert-heading">Access Restricted</h4>
    <p>You need to be logged in to create a new article.</p>
    <hr>

    <div class="d-flex justify-content-center gap-3 mt-3">
        <a href="{{ route('login') }}" class="btn btn-primary">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </a>

        <a href="{{ route('register') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Register
        </a>

    </div>

</div>


@endauth

@endsection
