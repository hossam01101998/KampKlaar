@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Create Damage Report</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('damage_reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="item_id">Item</label>
            <input list="items" name="item_id" id="item_id" class="form-control">
            <datalist id="items">
                @foreach($items as $item)
                    <option value="{{ $item->item_id }}">{{ $item->name }}</option>
                @endforeach
            </datalist>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" >
            @error('photo')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit Report</button>
    </form>

    <a href="{{ route('damage_reports.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>



@endsection
