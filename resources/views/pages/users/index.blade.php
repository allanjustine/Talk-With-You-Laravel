@extends('layout.base')

@section('title')
    Users
@endsection

@section('content')
    <div class="container">
        <h5 class="mt-3">
            {{ __('Users') }}
        </h5>
        <hr>
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body" style="overflow: auto;">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID No.</th>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Sex</th>
                                <th>Bio</th>
                                <th>Age</th>
                                <th>Date Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image"
                                            class="img-fluid rounded-circle"
                                            style="width: 70px; height: 70px; border: 3px solid black;"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->sex }}</td>
                                    <td>
                                        @if ($user->bio != null)
                                            {{ $user->bio }}
                                        @else
                                            <i class="far fa-xmark-circle text-danger"></i> No bio yet
                                        @endif
                                    </td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->created_at->format('l, F j, Y g:i A') }} -
                                        {{ $user->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
        @if ($users->count() === 0)
            <h5 class="text-center text-muted">
                No users found
            </h5>
        @endif
    </div>
@endsection
