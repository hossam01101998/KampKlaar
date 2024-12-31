@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2>Damage Report #{{ $damageReport->report_id }}</h2>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Details</h3>
        </div>

        @if($damageReport->photo)

        <img src="{{ asset($damageReport->photo) }}" alt="Damage report photo" class="img-fluid" style="max-width: 350px; max-height:500px; margin:1%; object-fit: cover; border-radius: 10px;">
        <br>
        @endif

        <div class="card-body">
            <p><strong>User:</strong> {{ $damageReport->user->username }}</p>
            <p><strong>Item:</strong> {{ $damageReport->item->name }}</p>
            <p><strong>Description:</strong> {{ $damageReport->description }}</p>

        </div>


        @if(auth()->user()->isadmin || auth()->user()->user_id === $damageReport->user_id)
        <div class="mt-3" style="padding: 1%">
        <form action="{{ route('damage_reports.destroy', $damageReport->report_id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        </div>
        @endif
</div>


    <div class="mt-3" >
    <a href="{{ route('damage_reports.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

@endsection
