@extends('layouts.app')

@section('content')

    @auth


<div class="container mt-5">
    <h2>Items List of "{{ $user->youth_movement }}":</h2>



    <form action="{{ route('items.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search items..." value="{{ old('search', $search ?? '') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- order -->

    <form action="{{ route('items.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="sort_by" class="form-select" onchange="this.form.submit()">
                    <option value="item_id" {{ $sortBy == 'item_id' ? 'selected' : '' }}>ID</option>
                    <option value="name" {{ $sortBy == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="quantity" {{ $sortBy == 'quantity' ? 'selected' : '' }}>Quantity</option>
                    <option value="place" {{ $sortBy == 'place' ? 'selected' : '' }}>Place</option>
                </select>
            </div>

            <div class="col-md-4">
                <select name="direction" class="form-select" onchange="this.form.submit()">
                    <option value="asc" {{ $direction == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ $direction == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>

            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



    <div class="mb-3">
        <a href="{{ route('items.create') }}" class="btn btn-primary">Create New Item</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th><a href="{{ route('items.index', ['sort_by' => 'item_id', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">ID</a></th>
                <th><a href="{{ route('items.index', ['sort_by' => 'name', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Name</a></th>

                <th>Description</th>

                <th><a href="{{ route('items.index', ['sort_by' => 'quantity', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Quantity</a></th>
                <th><a href="{{ route('items.index', ['sort_by' => 'place', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => $search]) }}">Place</a></th>

                @if (auth()->user()->isadmin)
                <th>Actions</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr onclick="window.location='{{ route('items.show', $item->item_id) }}'">

                    <td>{{ $item->item_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->place }}</td>

                    @if (auth()->user()->isadmin)

                    <td>

                        <a href="{{ route('items.show', $item->item_id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('items.edit', $item->item_id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('items.destroy', $item->item_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.stopPropagation(); return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>

                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No items found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endauth

@endsection


