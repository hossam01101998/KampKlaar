@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Damage Report #{{ $damageReport->report_id }}</h2>

    <p><strong>User:</strong> {{ $damageReport->user->username }}</p>
    <p><strong>Item:</strong> {{ $damageReport->item->name }}</p>
    <p><strong>Description:</strong> {{ $damageReport->description }}</p>

    <a href="{{ route('damage_reports.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
