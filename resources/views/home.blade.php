@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ Auth::user()->youth_movement }}</h1></div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if (session('welcome_message'))
                        <div class="alert alert-success">
                            {{ session('welcome_message') }}
                        </div>
                    @endif



                <div class="container mt-4">
                    @foreach ($users as $user)
                        <div class="card mb-3">

                            @if (auth()->check())

                            <div class="card-header">
                                <h6><strong>User ID: </strong>{{ $user->user_id }}</h6>
                            </div>
                            <div class="card-body">
                                <p><strong>Email: </strong> {{ $user->email }}</p>

                                <p><strong>Username: </strong>{{$user->username }}</p>

                                <p><strong>Role: </strong>{{ $user->isadmin ? 'Admin' : 'Leader' }}</p>




                                @if (auth()->user()->isadmin)

                                <div class="d-flex gap-2">

                                    @if (!$user->isadmin)
                                        <form action="{{ route('admin.make', ['user_id' => $user->user_id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">Make Admin</button>
                                        </form>


                                    @endif

                                    @if ($user->isadmin)
                                        <form action="{{ route('admin.remove', ['user_id' => $user->user_id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Remove Admin</button>
                                        </form>
                                    @endif


                                    <form action="{{ route('admin.delete', ['user_id' => $user->user_id]) }}" method="POST" id="delete-form-{{ $user->user_id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->user_id }})">Delete User</button>
                                    </form>

                                </div>

                                @endif

                            @else
                                <p>You are not logged in.</p>
                            @endif
                            </div>
                        </div>
                    @endforeach
                </div>




                </div>
            </div>
        </div>
    </div>
</div>




@endsection

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this user?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
