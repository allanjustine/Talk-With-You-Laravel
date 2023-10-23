<!-- ================= Appbar ================= -->
<div class="bg-white d-flex align-items-center sticky-top shadow" style="min-height: 56px; z-index: 5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- search -->
            <div class="col d-flex align-items-center">
                <!-- logo -->
                <img src="https://www.pngmart.com/files/4/Crazy-PNG-Transparent-Picture.png" alt="Branding picture"
                    style="width: 3rem">

                <!-- search bar -->
                <div class="input-group ms-2" type="button">
                    <!-- mobile -->
                    <span class="input-group-prepend d-lg-none" id="searchMenu" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <div class="input-group-text bg-gray border-0 rounded-circle" style="min-height: 40px">
                            <i class="fas fa-search text-muted"></i>
                        </div>
                    </span>
                    <!-- desktop -->
                    @auth
                        <span class="input-group-prepend d-none d-lg-block" id="searchMenu" data-bs-toggle="dropdown"
                            aria-expanded="false" data-bs-auto-close="outside">
                            <div class="input-group-text bg-gray border-0 rounded-pill"
                                style="min-height: 40px; min-width: 230px">
                                <i class="fas fa-search me-2 text-muted"></i>
                                <p class="m-0 fs-7 text-muted">
                                    @if (!$search)
                                        Search Talk With You
                                    @else
                                        {{ $search }}
                                    @endif
                                </p>
                            </div>
                        </span>
                    @endauth
                    <!-- search menu -->
                    <ul class="dropdown-menu overflow-auto border-0 shadow p-3" aria-labelledby="searchMenu"
                        style="width: 20em; max-height: 600px">
                        <!-- search input -->
                        <li>
                            {{-- <input type="text" class="rounded-pill border-0 bg-gray dropdown-item"
                                placeholder="Search Talk With You..." autofocus /> --}}

                            <form action="{{ route('search') }}" method="GET">
                                @csrf
                                <div class="form-group mb-0 mt-3">
                                    <form action="{{ route('search') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="search" class="form-control rounded-pill border-0 bg-gray "
                                                style="border-radius: 20px 0px 0px 20px;" name="search"
                                                placeholder="Search Talk With You..." autocomplete="search" autofocus>
                                            <button class="btn d-lg-none"><i
                                                    class="far fa-magnifying-glass"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </li>
                        <!-- search 1 -->
                        <li class="my-4">
                            <div class="alert fade show dropdown-item p-1 m-0 d-flex align-items-center justify-content-between"
                                role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/1" alt="avatar"
                                        class="rounded-circle me-2"
                                        style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </li>
                        <!-- search 2 -->
                        <li class="my-4">
                            <div class="alert fade show dropdown-item p-1 m-0 d-flex align-items-center justify-content-between"
                                role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/2" alt="avatar"
                                        class="rounded-circle me-2"
                                        style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </li>
                        <!-- search 3 -->
                        <li class="my-4">
                            <div class="alert fade show dropdown-item p-1 m-0 d-flex align-items-center justify-content-between"
                                role="alert">
                                <div class="d-flex align-items-center">
                                    <img src="https://source.unsplash.com/random/3" alt="avatar"
                                        class="rounded-circle me-2"
                                        style="width: 35px; height: 35px; object-fit: cover" />
                                    <p class="m-0">Lorem ipsum</p>
                                </div>
                                <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- nav -->
            @auth
                <div class="col d-none d-xl-flex justify-content-center">
                    <!-- home -->
                    <div class="mx-4 nav__btn {{ 'posts' == request()->path() ? 'nav__btn-active' : '' }}">
                        <a href="/posts" class="btn px-4">
                            <i class="fas fa-home text-muted fs-4"></i>
                        </a>
                    </div>
                    <!-- market -->
                    <div class="mx-4 nav__btn {{ 'market' == request()->path() ? 'nav__btn-active' : '' }}">
                        <button type="button" class="btn px-4">
                            <i class="fas fa-store text-muted fs-4"></i>
                        </button>
                    </div>
                    <!-- users -->
                    <div class="mx-4 nav__btn {{ 'users' == request()->path() ? 'nav__btn-active' : '' }}">
                        <button type="button" class="btn px-4">
                            <a href="/users">
                                <i type="button" class="position-relative fas fa-users text-muted fs-4">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-size: 0.5rem">
                                        {{ $userCount }}
                                        <span class="visually-hidden"></span>
                                    </span>
                                </i>
                            </a>
                        </button>
                    </div>
                    <!-- gaming -->
                    <div class="mx-4 nav__btn {{ 'games' == request()->path() ? 'nav__btn-active' : '' }}">
                        <button type="button" class="btn px-4">
                            <i class="fas fa-gamepad text-muted fs-4"></i>
                        </button>
                    </div>
                    <!-- dashboard -->
                    <div class="mx-4 nav__btn {{ 'dashboard' == request()->path() ? 'nav__btn-active' : '' }}">
                        <a href="/dashboard" class="btn px-4">
                            <i class="fas fa-tachometer-alt-slowest text-muted fs-4"></i>
                        </a>
                    </div>
                </div>
                <!-- menus -->
                <div class="col d-flex align-items-center justify-content-end">
                    <!-- main menu -->
                    <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
                        style="width: 38px; height: 38px" type="button" id="mainMenu" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="fas fa-grid-round"></i>
                    </div>
                    <!-- main menu dd -->
                    <ul class="dropdown-menu border-0 shadow p-3 overflow-auto" aria-labelledby="mainMenu"
                        style="width: 23em; max-height: 600px">
                        <!-- menu -->
                        <div>
                            <!-- header -->
                            <li class="p-1 mx-2">
                                <h2>Menu</h2>
                            </li>
                            <!-- search -->
                            <li class="p-1">
                                <div class="input-group-text bg-gray border-0 rounded-pill"
                                    style="min-height: 40px; min-width: 230px">
                                    <i class="fas fa-search me-2 text-muted"></i>
                                    <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                        placeholder="Search Menu" />
                                </div>
                            </li>
                            <!-- social items -->
                            <h4 class="m-2">Social</h4>
                            <!-- s1 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/Y7r38CcFEw5.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Campus</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- s2 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/N7UOh8REweU.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Events</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- s3 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/tSXYIzZlfrS.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Friends</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- s4 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/Im_0d7HFH4n.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Groups</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- s5 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yo/r/hLkEFzsCyXC.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">News Feed</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- s6 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/0gH3vbvr8Ee.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Pages</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <hr />
                            <!-- ent items -->
                            <h4 class="m-2">Entertainment</h4>
                            <!-- e1 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/Y7r38CcFEw5.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Campus</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- e2 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/N7UOh8REweU.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Events</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                            <!-- e3 -->
                            <li class="my-2 p-1">
                                <a href="#"
                                    class="text-decoration-none text-dark d-flex align-items-center justify-content-between">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/tSXYIzZlfrS.png"
                                            alt="icon from fb" class="rounded-circle"
                                            style="width: 48px; height: 48px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Friends</p>
                                        <span class="fs-7 text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing
                                            elit. Odio, commodi.</span>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <hr />
                        <!-- create -->
                        <div>
                            <!-- header -->
                            <li class="p-1 mx-2">
                                <h2>Create</h2>
                            </li>
                            <!-- c-1 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Post</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-2 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Story</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-3 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Video</p>
                                    </div>
                                </a>
                            </li>
                            <hr />
                            <!-- c-4 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Page</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-5 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Add</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-6 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Group</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-7-->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Event</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-8 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-shopping-basket"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Marketplace Listing</p>
                                    </div>
                                </a>
                            </li>
                            <!-- c-9 -->
                            <li class="my-2 p-1">
                                <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                    <div class="rounded-circle bg-gray p-1 d-flex align-items-center justify-content-center me-3"
                                        style="width: 38px; height: 38px">
                                        <i class="fas fa-suitcase"></i>
                                    </div>
                                    <div>
                                        <p class="m-0">Job</p>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <!-- chat -->
                    <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
                        style="width: 38px; height: 38px" type="button" id="chatMenu" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="fas fa-comment"></i>
                    </div>
                    <!-- chat  dd -->
                    <ul class="dropdown-menu border-0 shadow p-3 overflow-auto" aria-labelledby="chatMenu"
                        style="width: 23em; max-height: 600px">
                        <!-- header -->
                        <li class="p-1">
                            <div class="d-flex justify-content-between">
                                <h2>Message</h2>
                                <div>
                                    <!-- setting -->
                                    <i class="fas fa-ellipsis-h text-muted mx-2" type="button"
                                        data-bs-toggle="dropdown"></i>
                                    <!-- setting dd -->
                                    <ul class="dropdown-menu shadow" style="width: 18em">
                                        <!-- title -->
                                        <div class="p-2">
                                            <h5>Chat Settings</h5>
                                            <span class="text-muted fs-7">Customize your Messenger experience.</span>
                                        </div>
                                        <hr />
                                        <!-- incoming sound -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-phone-alt me-3"></i>
                                                    <p class="m-0">Incoming call sounds</p>
                                                </div>
                                                <!-- toggle -->
                                                <div class="form-check form-switch m-0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- message sound -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-volume-off me-4 fs-4"></i>
                                                    <p class="m-0">Message sounds</p>
                                                </div>
                                                <!-- toggle -->
                                                <div class="form-check form-switch m-0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- popup message -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-spinner me-3"></i>
                                                    <p class="m-0">Pop-up new messages</p>
                                                </div>
                                                <!-- toggle -->
                                                <div class="form-check form-switch m-0">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                            <span class="ms-5 text-muted fs-7">Automatically open new messages.</span>
                                        </li>
                                        <hr class="m-0" />
                                        <!-- item 1 -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-toggle-off me-3"></i>
                                                    <p class="m-0">Turn Off Active Status</p>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- item 2 -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="far fa-comment-alt me-3"></i>
                                                    <p class="m-0">Message Request</p>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- item 3 -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-share-square me-3"></i>
                                                    <p class="m-0">Message delivery settings</p>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- item 4 -->
                                        <li>
                                            <div class="dropdown-item d-flex align-items-center justify-content-between">
                                                <!-- icon -->
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-shield-alt me-3"></i>
                                                    <p class="m-0">Block settings</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <i class="fas fa-expand-arrows-alt text-muted mx-2" type="button"></i>
                                    <!-- new message -->
                                    <i class="fas fa-edit text-muted mx-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#newChat"></i>
                                </div>
                            </div>
                        </li>
                        <!-- search -->
                        <li class="p-1">
                            <div class="input-group-text bg-gray border-0 rounded-pill"
                                style="min-height: 40px; min-width: 230px">
                                <i class="fas fa-search me-2 text-muted"></i>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Search Messenger" />
                            </div>
                        </li>
                        <!-- message 1 -->
                        <li class="my-2 p-1" type="button" data-bs-toggle="modal" data-bs-target="#singleChat1">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- big avatar -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/1" alt="avatar"
                                            class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="fs-7 m-0">Mike</p>
                                        <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                                    </div>
                                </div>
                                <!-- small avatar -->
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle"
                                        style="width: 15px; height: 15px; object-fit: cover" />
                                </div>
                            </div>
                        </li>
                        <!-- message 2 -->
                        <li class="my-2 p-1" type="button" data-bs-toggle="modal" data-bs-target="#singleChat2">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- big avatar -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/2" alt="avatar"
                                            class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="fs-7 m-0">
                                            Tuan
                                            <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                                        </p>
                                    </div>
                                </div>
                                <!-- small avatar -->
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/2" alt="avatar" class="rounded-circle"
                                        style="width: 15px; height: 15px; object-fit: cover" />
                                </div>
                            </div>
                        </li>
                        <!-- message 3 -->
                        <li class="my-2 p-1" type="button" data-bs-toggle="modal" data-bs-target="#singleChat3">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- big avatar -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/3" alt="avatar"
                                            class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="fs-7 m-0">Jerry</p>
                                        <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                                    </div>
                                </div>
                                <!-- small avatar -->
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/3" alt="avatar" class="rounded-circle"
                                        style="width: 15px; height: 15px; object-fit: cover" />
                                </div>
                            </div>
                        </li>
                        <!-- message 4 -->
                        <li class="my-2 p-1" type="button" data-bs-toggle="modal" data-bs-target="#singleChat4">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- big avatar -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="fs-7 m-0">Tony</p>
                                        <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                                    </div>
                                </div>
                                <!-- small avatar -->
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/4" alt="avatar" class="rounded-circle"
                                        style="width: 15px; height: 15px; object-fit: cover" />
                                </div>
                            </div>
                        </li>
                        <!-- message 5 -->
                        <li class="my-2 p-1" type="button" data-bs-toggle="modal" data-bs-target="#singleChat5">
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- big avatar -->
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/5" alt="avatar"
                                            class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="fs-7 m-0">Phu</p>
                                        <span class="fs-7 text-muted">Lorem ipsum &#8226; 7d</span>
                                    </div>
                                </div>
                                <!-- small avatar -->
                                <div class="p-2">
                                    <img src="https://source.unsplash.com/random/5" alt="avatar" class="rounded-circle"
                                        style="width: 15px; height: 15px; object-fit: cover" />
                                </div>
                            </div>
                        </li>
                        <hr class="m-0" />
                        <a href="#" class="text-decoration-none">
                            <p class="fw-bold text-center pt-3 m-0">See All in Messenger</p>
                        </a>
                    </ul>
                    <!-- notifications -->
                    <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
                        style="width: 38px; height: 38px" type="button" id="notMenu" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <i class="fas fa-bell position-relative">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size: 0.5rem">
                                {{ $unreadCount = auth()->user()->unreadNotifications()->count() }}
                                <span class="visually-hidden"></span>
                            </span>
                        </i>
                    </div>
                    <!-- notifications dd -->
                    <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="notMenu"
                        style="width: 23em; max-height: 600px; overflow-y: auto">
                        <!-- header -->
                        <li class="p-1">
                            <div class="d-flex justify-content-between">
                                <h2>Notifications</h2>
                                <div>
                                    <i class="fas fa-ellipsis-h pointer p-2 rounded-circle bg-gray" type="button"
                                        data-bs-toggle="dropdown"></i>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item d-flex align-items-center" type="button">
                                            <i class="fas fa-check me-3 text-muted"></i>
                                            <p class="m-0">Mark all as read</p>
                                        </li>
                                        <li class="dropdown-item d-flex align-items-center" type="button">
                                            <i class="fas fa-cog me-3 text-muted"></i>
                                            <p class="m-0">Privacy Checkup</p>
                                        </li>
                                        <li class="dropdown-item d-flex align-items-center" type="button">
                                            <i class="fas fa-desktop me-3 text-muted"></i>
                                            <p class="m-0">Privacy Shortcuts</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex" type="button">
                                <p class="rounded-pill bg-gray p-2">All</p>
                                <p class="ms-3 rounded-pill p-2">
                                    Unread
                                </p>
                            </div>
                        </li>
                        <!-- news -->
                        <div class="d-flex justify-content-between mx-2">
                            <h5>New</h5>
                            <a href="#" class="text-decoration-none">See All</a>
                        </div>
                        <!-- news 1 -->
                        <li class="my-2 p-1">
                            @forelse ($user->notifications as $notification)
                                @if (isset($notification->data['liker_id']) && $notification->data['liker_id'] == auth()->id())
                                    <div class="d-none">
                                        <a href="#"
                                            class="d-flex align-items-center text-decoration-none text-dark">
                                            <div class="d-flex align-items-center">
                                                <div class="p-2 position-relative">
                                                    <img src="{{ Storage::url($notification->data['liker_picture']) }}"
                                                        alt="avatar" class="rounded-circle"
                                                        style="width: 58px; height: 58px; object-fit: cover" />

                                                    <!-- Like Badge -->
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <span class="badge bg-primary p-2 rounded-circle"><i
                                                                class="fas fa-thumbs-up"></i></span>
                                                    </div>
                                                </div>

                                                <div class="ml-2">
                                                    <p class="fs-7 m-0">
                                                        <strong>You</strong>
                                                        liked to your own post.
                                                    </p>
                                                    <i class="fas fa-circle fs-7 text-primary position-absolute mr-3"
                                                        style="right: 0;"></i>
                                                    <span
                                                        class="fs-7 text-primary">{{ $notification->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif (isset($notification->data['liker_name']))
                                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2 position-relative">
                                                <img src="{{ Storage::url($notification->data['liker_picture']) }}"
                                                    alt="avatar" class="rounded-circle"
                                                    style="width: 58px; height: 58px; object-fit: cover" />

                                                <!-- Like Badge -->
                                                <div class="position-absolute bottom-0 end-0">
                                                    <span class="badge bg-primary p-2 rounded-circle"><i
                                                            class="fas fa-thumbs-up"></i></span>
                                                </div>
                                            </div>

                                            <div class="ml-2">
                                                <p class="fs-7 m-0">
                                                    <strong>{{ $notification->data['liker_name'] }}</strong>
                                                    liked to your post.
                                                </p>
                                                <i class="fas fa-circle fs-7 text-primary position-absolute mr-3"
                                                    style="right: 0;"></i>
                                                <span
                                                    class="fs-7 text-primary">{{ $notification->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @elseif (isset($notification->data['commentor_id']) && $notification->data['commentor_id'] == auth()->id())
                                    <div class="d-none">
                                        <a href="#"
                                            class="d-flex align-items-center text-decoration-none text-dark">
                                            <div class="d-flex align-items-center">
                                                <div class="p-2 position-relative">
                                                    <img src="{{ Storage::url($notification->data['commentor_picture']) }}"
                                                        alt="avatar" class="rounded-circle"
                                                        style="width: 58px; height: 58px; object-fit: cover" />

                                                    <!-- Comment Badge -->
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <span class="badge bg-primary p-2 rounded-circle"><i
                                                                class="fas fa-comment-dots"></i></span>
                                                    </div>
                                                </div>

                                                <div class="ml-2">
                                                    <p class="fs-7 m-0">
                                                        <strong>You</strong>
                                                        commented to your
                                                        own post.
                                                    </p>
                                                    <i class="fas fa-circle fs-7 text-primary position-absolute mr-3"
                                                        style="right: 0;"></i>
                                                    <span
                                                        class="fs-7 text-primary">{{ $notification->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @elseif (isset($notification->data['commentor_name']))
                                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2 position-relative">
                                                <img src="{{ Storage::url($notification->data['commentor_picture']) }}"
                                                    alt="avatar" class="rounded-circle"
                                                    style="width: 58px; height: 58px; object-fit: cover" />

                                                <!-- Like Badge -->
                                                <div class="position-absolute bottom-0 end-0">
                                                    <span class="badge bg-primary p-2 rounded-circle"><i
                                                            class="fas fa-comment-dots"></i></span>
                                                </div>
                                            </div>

                                            <div class="ml-2">
                                                <p class="fs-7 m-0">
                                                    <strong>{{ $notification->data['commentor_name'] }}</strong>
                                                    commented on your
                                                    post.
                                                </p>
                                                <i class="fas fa-circle fs-7 text-primary position-absolute mr-3"
                                                    style="right: 0;"></i>
                                                <span
                                                    class="fs-7 text-primary">{{ $notification->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @empty
                                <h5 class="text-center text-muted">
                                    <i class="far fa-bell-slash"></i>
                                </h5>
                                <h6 class="text-center text-muted">
                                    No notifications available
                                </h6>
                            @endforelse
                        </li>
                    </ul>
                    <!-- secondary menu -->
                    <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center mx-2"
                        style="width: 38px; height: 38px" type="button" id="secondMenu" data-bs-toggle="dropdown"
                        aria-expanded="false" data-bs-auto-close="outside">
                        <img src="{{ Storage::url(auth()->user()->profile_image) }}" class="rounded-circle"
                            alt="avatar" style="width: 38px; height: 38px;" />
                    </div>
                    <!-- secondary menu dd -->
                    <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="secondMenu" style="width: 23em">
                        <!-- avatar -->
                        <a href="/profile" class="text-decoration-none">
                            <li class="dropdown-item p-1 rounded d-flex" type="button">
                                <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="avatar"
                                    class="rounded-circle me-2" style="width: 45px; height: 45px; object-fit: cover" />
                                <div>
                                    <p class="m-0">{{ auth()->user()->name }}</p>
                                    <p class="m-0 text-muted">See your profile</p>
                                </div>
                            </li>
                        </a>
                        <hr />
                        <!-- feedback -->
                        <li class="dropdown-item p-1 rounded d-flex align-items-center" type="button">
                            <i class="fas fa-exclamation-circle bg-gray p-2 rounded-circle"></i>
                            <div class="ms-3">
                                <p class="m-0">Give Feedback</p>
                                <p class="m-0 text-muted fs-7">
                                    Help us improve the new Talk With You.
                                </p>
                            </div>
                        </li>
                        <hr />
                        <!-- options -->
                        <!-- 1 -->
                        <li class="dropdown-item p-1 my-3 rounded" type="button">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div class="d-flex" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Settings & Privacy</p>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                    <!-- nested menu -->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="/profile-settings/{{ auth()->user()->id }}">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-cog"></i>
                                                </div>
                                                <p class="m-0">Settings</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                <p class="m-0">Privacy Checkup</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-unlock-alt"></i>
                                                </div>
                                                <p class="m-0">Privacy Shortcuts</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-list"></i>
                                                </div>
                                                <p class="m-0">Activity Log</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-newspaper"></i>
                                                </div>
                                                <p class="m-0">News Feed Preferences</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <p class="m-0">Language</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- 2 -->
                        <li class="dropdown-item p-1 my-3 rounded" type="button">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div class="d-flex" data-bs-toggle="dropdown">
                                        <i class="fas fa-question-circle bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Help & Support</p>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                    <!-- nested menu -->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-cog"></i>
                                                </div>
                                                <p class="m-0">Settings</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                <p class="m-0">Privacy Checkup</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-unlock-alt"></i>
                                                </div>
                                                <p class="m-0">Privacy Shortcuts</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-list"></i>
                                                </div>
                                                <p class="m-0">Activity Log</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-newspaper"></i>
                                                </div>
                                                <p class="m-0">News Feed Preferences</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <p class="m-0">Language</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- 3 -->
                        <li class="dropdown-item p-1 my-3 rounded" type="button">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div class="d-flex" data-bs-toggle="dropdown">
                                        <i class="fas fa-moon bg-gray p-2 rounded-circle"></i>
                                        <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                            <p class="m-0">Display & Accessibility</p>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                    <!-- nested menu -->
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-cog"></i>
                                                </div>
                                                <p class="m-0">Settings</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                                <p class="m-0">Privacy Checkup</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-unlock-alt"></i>
                                                </div>
                                                <p class="m-0">Privacy Shortcuts</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-list"></i>
                                                </div>
                                                <p class="m-0">Activity Log</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-newspaper"></i>
                                                </div>
                                                <p class="m-0">News Feed Preferences</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="rounded-circle p-1 bg-gray d-flex align-items-center justify-content-center me-2"
                                                    style="width: 38px; height: 38px">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <p class="m-0">Language</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- 4 -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li class="dropdown-item p-0 my-3 rounded" type="button">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <button type="submit"
                                            class="d-flex btn p-0 w-100 text-decoration-none text-dark">
                                            <i class="fas fa-sign-out-alt bg-gray p-2 rounded-circle"></i>
                                            <div class="ms-3 d-flex justify-content-between align-items-center w-100">
                                                <p class="m-0">Log Out</p>
                                            </div>
                                        </button>
                                    </li>
                                </ul>
                            </li>
                        </form>
                    </ul>
                @endauth
                @guest
                    <div class="col d-none d-md-flex align-items-center justify-content-end">
                        <input type="email" class="form-control" placeholder="Email address" />
                        <input type="password" class="form-control ml-2" placeholder="Password" />
                        <a href="/login" class="btn btn-primary form-control ml-2">Log In</a>
                        <button class="btn w-100 ml-2 text-primary">Forgot Account?</button>
                    </div>
                    <div class="col d-sm-flex d-md-none align-items-center justify-content-end">
                        <a href="/login" class="btn btn-primary">Log In Here</a>
                    </div>

                @endguest
                <!-- end -->
            </div>
        </div>
    </div>
</div>

<div
    class="col d-lg-none d-md-flex justify-content-center shadow navbar fixed-bottom navbar-light bg-light d-flex justify-content-between">
    <!-- home -->
    <div class="nav__btn {{ 'posts' == request()->path() ? 'nav__btn-active' : '' }}">
        <a href="/posts" class="btn">
            <i class="fas fa-home text-muted fs-4"></i>
        </a>
    </div>
    <div class="nav__btn {{ 'market' == request()->path() ? 'nav__btn-active' : '' }}">
        <a href="/market" class="btn">
            <i class="fas fa-store text-muted fs-4"></i>
        </a>
    </div>
    @auth
        <div class="nav__btn {{ 'users' == request()->path() ? 'nav__btn-active' : '' }}">
            <a href="/users">
                <i type="button" class="position-relative fas fa-users text-muted fs-4">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        style="font-size: 0.5rem">
                        {{ $userCount }}
                        <span class="visually-hidden"></span>
                    </span>
                </i>
            </a>
        </div>
    @endauth
    <div class="nav__btn {{ 'games' == request()->path() ? 'nav__btn-active' : '' }}">
        <a href="/games" class="btn">
            <i class="fas fa-gamepad text-muted fs-4"></i>
        </a>
    </div>
    @auth
        <div class="nav__btn {{ 'dashboard' == request()->path() ? 'nav__btn-active' : '' }}">
            <a href="/dashboard" class="btn">
                <i class="fas fa-tachometer-alt-slowest text-muted fs-4"></i>
            </a>
        </div>
    @endauth
</div>



{{-- <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top">
    <a class="navbar-brand text-center mx-auto pl-5" href="#"><img
            src="https://www.pngmart.com/files/4/Crazy-PNG-Transparent-Picture.png" alt="Logo" width="50"
            height="30"> <span class="text-white text-center"><b>TWY</b></span></a>


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
                <a class="nav-link text-white text-center" href="/about-us"><i class="far fa-user-tag"></i> About
                    Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white text-center" href="/contact-us"><i class="far fa-paper-plane"></i>
                    Contact
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
                                                    <i class="fas fa-comment-dots text-secondary"></i> commented to your
                                                    own post.
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
                                                    <i class="fas fa-comment-dots text-secondary"></i> commented on your
                                                    post.
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
        </ul>
    </div>
</nav>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Logout</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>

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
 --}}
<style>
    .dropdown-item.active,
    .dropdown-item:active {
        color: #16181b;
        text-decoration: none;
        background-color: #f8f9fa;
    }

    /* .notification-time {
        font-size: 13px;
        color: #1361c7;
    } */
</style>
