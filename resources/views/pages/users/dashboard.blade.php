@extends('layout.base')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h5 class="mt-4">Dashboard</h5>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3><b>Users</b></h3>
                                <p class="text-gray font-italic">{{ $usersCount }}</p>
                            </div>
                            <i class="far fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3><b>Posts</b></h3>
                                <p class="text-gray font-italic">{{ $postsCount }}</p>
                            </div>
                            <i class="far fa-file-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3><b>Activities</b></h3>
                                <p class="text-gray font-italic">100</p>
                            </div>
                            <i class="far fa-chart-line fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="text-center text-muted">Account History</h5>
            </div>
            <div class="card-body">
                <h6 class="text-center text-gray font-italic p-5">You created your account on
                    ({{ auth()->user()->created_at->format('l, F j, Y g:i A') }})</h6>
            </div>
        </div>
    </div>
@endsection
