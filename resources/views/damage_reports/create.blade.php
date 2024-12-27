@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Create Damage Report</h2>

    <form action="{{ route('damage_reports.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="item_id">Item</label>
            <select name="item_id" id="item_id" class="form-control">
                @foreach($items as $item)
                    <option value="{{ $item->item_id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit Report</button>
    </form>

    <a href="{{ route('damage_reports.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
