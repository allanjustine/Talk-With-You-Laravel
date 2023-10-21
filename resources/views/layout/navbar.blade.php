<nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
    <a class="navbar-brand text-center mx-auto pl-5" href="#"><img
            src="https://www.pngmart.com/files/4/Crazy-PNG-Transparent-Picture.png" alt="Logo" width="50"
            height="30"> <span class="text-white text-center"><b>TWY</b></span></a>

    <!-- Toggle button for small screens -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white text-center" aria-current="page" href="/dashboard"><i
                            class="far fa-tachometer-alt-slowest"></i> Dashboard</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white text-center" aria-current="page" href="/"><i
                            class="far fa-home"></i>
                        Home</a>
                </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="/posts"><i class="far fa-pencil-alt"></i> Posts</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white text-center" href="/users"><i class="far fa-users"></i> Users</a>
                </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="/about-us"><i class="far fa-user-tag"></i> About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="/contact-us"><i class="far fa-paper-plane"></i> Contact
                    Us</a>
            </li>
        </ul>

        <ul class="navbar-nav">
            @auth
                <li class="nav-item">
                    <div class="dropdown">
                        <div class="nav-link text-white text-center" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" style="cursor: pointer;">
                            <i class="fas fa-bell"></i> <span class="d-lg-none">Notifications</span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right p-3">
                            <h5>Notifications</h5>
                            <div class="dropdown-divider"></div>
                            @forelse ($user->notifications as $notification)
                                @if (isset($notification->data['liker_id']) && $notification->data['liker_id'] == auth()->id())
                                    <div class="mb-3" hidden>
                                        <div style="position: absolute;">
                                            <img src="{{ Storage::url($notification->data['liker_picture']) }}"
                                                alt="Profile Image" class="rounded-circle"
                                                style="width: 45px; height: 45px; border: 3px solid black;">
                                        </div>
                                        <div class="ml-5">
                                            <a href="#" class="dropdown-item p-0">
                                                <strong>You</strong>
                                                <p class="mb-0">
                                                    <i class="fas fa-thumbs-up text-primary"></i> liked to your own post.
                                                </p>
                                                <p class="mb-0">
                                                    <span
                                                        class="notification-time"><strong>{{ $notification->created_at->diffForHumans() }}</strong></span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @elseif (isset($notification->data['liker_name']))
                                    <div class="mb-3">
                                        <div style="position: absolute;">

                                            <img src="{{ Storage::url($notification->data['liker_picture']) }}"
                                                alt="Profile Image" class="rounded-circle"
                                                style="width: 45px; height: 45px; border: 3px solid black;">
                                        </div>
                                        <div class="ml-5">

                                            <a href="#" class="dropdown-item p-0">
                                                <strong>{{ $notification->data['liker_name'] }}</strong>
                                                <p class="mb-0">
                                                    <i class="fas fa-thumbs-up text-primary"></i> liked to your post.
                                                </p>
                                                <p class="mb-0">
                                                    <span
                                                        class="notification-time"><strong>{{ $notification->created_at->diffForHumans() }}</strong></span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @elseif (isset($notification->data['commentor_id']) && $notification->data['commentor_id'] == auth()->id())
                                    <div class="mb-3" hidden>

                                        <div style="position: absolute;">
                                            <img src="{{ Storage::url($notification->data['commentor_picture']) }}"
                                                alt="Profile Image" class="rounded-circle"
                                                style="width: 45px; height: 45px; border: 3px solid black;">
                                        </div>
                                        <div class="ml-5">
                                            <a href="#" class="dropdown-item p-0">
                                                <strong>You</strong>
                                                <p class="mb-0">
                                                    <i class="fas fa-comment-dots text-secondary"></i> commented to your own post.
                                                </p>
                                                <p class="mb-0">
                                                    <span
                                                        class="notification-time"><strong>{{ $notification->created_at->diffForHumans() }}</strong></span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @elseif (isset($notification->data['commentor_name']))
                                    <div class="mb-3">
                                        <div style="position: absolute;">
                                            <img src="{{ Storage::url($notification->data['commentor_picture']) }}"
                                                alt="Profile Image" class="rounded-circle"
                                                style="width: 45px; height: 45px; border: 3px solid black;">
                                        </div>
                                        <div class="ml-5">
                                            <a href="#" class="dropdown-item p-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <strong>{{ $notification->data['commentor_name'] }}</strong>

                                                </div>
                                                <p class="mb-0">
                                                    <i class="fas fa-comment-dots text-secondary"></i> commented on your post.
                                                </p>
                                                <p class="mb-0">
                                                    <span class="notification-time">
                                                        <strong>{{ $notification->created_at->diffForHumans() }}</strong>
                                                    </span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <h5 class="text-center text-muted">
                                    <i class="far fa-bell-slash"></i>
                                </h5>
                                <h6 class="text-center text-muted">
                                    No notifications available
                                </h6>
                            @endforelse

                        </div>
                    </div>
                </li>
            @endauth
            <li class="nav-item">
                <div class="dropdown">
                    <div class="nav-link text-white text-center" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" style="cursor: pointer;">
                        <i class="far fa-gears"></i> <span class="d-lg-none">Settings</span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 280px;">
                        @auth
                            <h6>
                                <a href="/profile" class="dropdown-item">
                                    <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="Profile Image"
                                        class="rounded-circle"
                                        style="width: 40px; height: 40px; border: 3px solid black;">
                                    {{ auth()->user()->name }}
                                </a>
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a href="/profile-settings/{{ auth()->user()->id }}" class="dropdown-item">
                                <i class="far fa-user-gear"></i> Profile Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#myModal">
                                <i class="far fa-sign-out-alt"></i> Logout</button>
                        @else
                            <h6 class="p-3 text-center">
                                <i class="far fa-hand-wave"></i> Hello, Guest
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a href="/login" class="dropdown-item">
                                <i class="far fa-sign-in-alt"></i> Login
                            </a>
                            <a href="/register" class="dropdown-item mt-1">
                                <i class="far fa-user-gear"></i> Register
                            </a>
                        @endauth
                    </div>
                </div>
            </li>
            {{-- @auth
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white text-center" data-toggle="modal" data-target="#myModal">
                            <i class="far fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link text-white text-center">
                            <i class="far fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="/register" class="nav-link text-white text-center">
                            <i class="far fa-user-gear"></i> Register
                        </a>
                    </li>
                @endauth --}}
        </ul>
    </div>
</nav>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Logout</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Yes, Logout</button>
                </form>
            </div>

        </div>
    </div>
</div>

<style>
    .dropdown-item.active,
    .dropdown-item:active {
        color: #16181b;
        text-decoration: none;
        background-color: #f8f9fa;
    }

    .notification-time {
        font-size: 13px;
        color: #1361c7;
    }
</style>
