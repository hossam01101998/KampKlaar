@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Damage Reports</h2>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('damage_reports.create') }}" class="btn btn-primary mb-3">Create Damage Report</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Item</th>
                <th>Description</th>
                @if(auth()->user()->isadmin)
                <th>Actions</th>
                @endif
                @if(!auth()->user()->isadmin)
                <th>View</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($damageReports as $damageReport)
            <tr onclick="window.location='{{ route('damage_reports.show', $damageReport->report_id) }}'">

                <td>{{ $damageReport->report_id }}</td>
                <td>{{ $damageReport->user->username }}</td>
                <td>{{ $damageReport->item->name }}</td>
                <td>{{ $damageReport->description }}</td>
                <td>
                    <a href="{{ route('damage_reports.show', $damageReport->report_id) }}" class="btn btn-info btn-sm">View</a>
                    @if(auth()->user()->isadmin)
                    <form action="{{ route('damage_reports.destroy', $damageReport->report_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No damage reports found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
