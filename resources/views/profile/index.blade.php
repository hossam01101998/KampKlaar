@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>User Profile</h2>

    <div class="card mb-4">
        <div class="card-header">
            <h5>{{ $user->username }}</h5>
        </div>
        <div class="card-body">

            <div class="mb-4">

                @if($user->photo)

                 <img src="{{ asset($user->photo) }}" alt="User Profile Image" class="img-fluid" style="max-width: 350px; max-height:500px; object-fit: cover; border-radius: 10px;">

                @else
                <img src="https://images.vexels.com/content/137047/preview/user-profile-blue-icon-32113c.png" alt="User Profile Image" class="img-fluid" style="max-width: 350px;">
                
                @endif
            </div>

            <div class="mb-3">
                <strong>Username:</strong> {{ $user->username }}
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ $user->email }}
            </div>
            <div class="mb-3">
                <strong>Phone:</strong> {{ $user->phone }}
            </div>
            <div class="mb-3">
                <strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}
            </div>
            <div class="mb-3">
                <strong>Role:</strong> {{ $user->isadmin ? 'Admin' : 'Leader' }}
            </div>
            <div class="mb-3">
                <strong>Youth Movement:</strong> {{ $user->youth_movement }}
            </div>

        <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>


    </div>

</div>



    <div class="card">
        <div class="card-header">
            <h5>Your Reservations</h5>
        </div>
        <div class="card-body">
            @if($user->reservations->isEmpty())
                <p>No reservations found.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->reservations as $reservation)
                        <tr onclick="window.location='{{ route('reservations.show', $reservation->reservation_id) }}'">

                            <td>{{ $reservation->item->name }}</td>
                            <td>{{ $reservation->quantity }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->start_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->end_date)->format('d M Y') }}</td>
                            <td>
                                @if($reservation->status)
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-danger">Canceled</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>




@endsection
