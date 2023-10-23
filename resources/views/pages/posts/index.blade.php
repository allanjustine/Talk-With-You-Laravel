@extends('layout.base')

@section('title')
    Posts
@endsection


@section('content')
    @auth
        @include('pages.posts.create')
    @endauth
    <div class="position-relative">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show mt-3 py-3 text-center" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 py-3 text-center" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- <div class="d-flex justify-content-center">
            <div class="card col-md-6 col-sm-6 p-3 mt-3">
                <div class="form-group mb-0 mt-3">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control" style="border-radius: 20px 0px 0px 20px;"
                                name="search" placeholder="Search TWY post" autocomplete="search" autofocus>
                            <button class="btn border"><i class="far fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr> --}}

        <div class="modal fade" id="newChat" tabindex="-1" aria-labelledby="newChatLabel" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-75 shadow"
                style="transform: translateX(-80px)">
                <div class="modal-content border-0">
                    <!-- head -->
                    <div class="modal-header align-items-start">
                        <div>
                            <h6 class="modal-title text-dark mb-2" id="newChat1Label">
                                New Message
                            </h6>
                            <label class="text-dark">To:</label>
                            <input type="text" class="border-0" />
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body shadow m-0 chat-border">
                        <p class="m-0 text-primary ms-4">Suggested</p>
                    </div>
                    <!-- footer -->
                    <div class="modal-footer border-0" style="min-height: 300px"></div>
                </div>
            </div>
        </div>
        <!-- ================= Chat Modal Mobile ================= -->
        <!-- chat 1 -->
        <div class="modal fade" id="singleChat1" tabindex="-1" aria-labelledby="singleChat1Label" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17" style="transform: translateX(-80px)">
                <div class="modal-content border-0 shadow">
                    <!-- head -->
                    <div class="modal-header">
                        <div class="dropdown-item d-flex rounded" type="button" data-bs-container="body"
                            data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content='
              <div>
                <div class="popover-body d-flex flex-column p-0">
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-comment me-3 fs-4"></i>
                    <p class="m-0">Open Messenger App</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-user me-3 fs-4"></i>
                    <p class="m-0">Open Messenger App</p>
                  </div>
                  <hr>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="fas fa-fill-drip me-3 fs-4"></i>
                    <p class="m-0">Color</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="far fa-smile-beam me-3 fs-4"></i>
                    <p class="m-0">Emoji</p>
                  </div>
                  <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                    <i class="fas fa-pencil-alt me-3 fs-4"></i>
                    <p class="m-0">Nicknames</p>
                  </div>
                </div>
              </div>
              '
                            data-bs-html="true">
                            <!-- avatar -->
                            <div class="position-relative">
                                <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle me-2"
                                    style="width: 38px; height: 38px; object-fit: cover" />
                                <span
                                    class="position-absolute bottom-0 translate-middle p-1 bg-success border border-light rounded-circle"
                                    style="left: 75%">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <!-- name -->
                            <div>
                                <p class="m-0">Mike <i class="fas fa-angle-down"></i></p>
                                <span class="text-muted fs-7">Active Now</span>
                            </div>
                        </div>
                        <!-- close -->
                        <i class="fas fa-video mx-2 text-muted pointer"></i>
                        <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle me-2"
                                    style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle me-2"
                                    style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/1" alt="avatar" class="rounded-circle me-2"
                                    style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                    </div>
                    <!-- message input -->
                    <div class="modal-footer p-0 m-0 border-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Aa" />
                            </div>
                            <div class="d-flex align-items-center mx-2">
                                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chat 2 -->
        <div class="modal fade" id="singleChat2" tabindex="-1" aria-labelledby="singleChat2Label" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17" style="transform: translateX(-80px)">
                <div class="modal-content border-0 shadow">
                    <!-- head -->
                    <div class="modal-header">
                        <div class="dropdown-item d-flex rounded" type="button" data-bs-container="body"
                            data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content='
                <div>
                  <div class="popover-body d-flex flex-column p-0">
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-comment me-3 fs-4"></i>
                      <p class="m-0">Open Messenger App</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-user me-3 fs-4"></i>
                      <p class="m-0">Open Messenger App</p>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="fas fa-fill-drip me-3 fs-4"></i>
                      <p class="m-0">Color</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="far fa-smile-beam me-3 fs-4"></i>
                      <p class="m-0">Emoji</p>
                    </div>
                    <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                      <i class="fas fa-pencil-alt me-3 fs-4"></i>
                      <p class="m-0">Nicknames</p>
                    </div>
                  </div>
                </div>
                '
                            data-bs-html="true">
                            <!-- avatar -->
                            <div class="position-relative">
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <span
                                    class="position-absolute bottom-0 translate-middle p-1 bg-success border border-light rounded-circle"
                                    style="left: 75%">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <!-- name -->
                            <div>
                                <p class="m-0">Tuan <i class="fas fa-angle-down"></i></p>
                                <span class="text-muted fs-7">Active Now</span>
                            </div>
                        </div>
                        <!-- close -->
                        <i class="fas fa-video mx-2 text-muted pointer"></i>
                        <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                    </div>
                    <!-- message input -->
                    <div class="modal-footer p-0 m-0 border-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Aa" />
                            </div>
                            <div class="d-flex align-items-center mx-2">
                                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chat 3 -->
        <div class="modal fade" id="singleChat3" tabindex="-1" aria-labelledby="singleChat3Label" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17" style="transform: translateX(-80px)">
                <div class="modal-content border-0 shadow">
                    <!-- head -->
                    <div class="modal-header">
                        <div class="dropdown-item d-flex rounded" type="button" data-bs-container="body"
                            data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content='
                    <div>
                      <div class="popover-body d-flex flex-column p-0">
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-comment me-3 fs-4"></i>
                          <p class="m-0">Open Messenger App</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-user me-3 fs-4"></i>
                          <p class="m-0">Open Messenger App</p>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="fas fa-fill-drip me-3 fs-4"></i>
                          <p class="m-0">Color</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="far fa-smile-beam me-3 fs-4"></i>
                          <p class="m-0">Emoji</p>
                        </div>
                        <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                          <i class="fas fa-pencil-alt me-3 fs-4"></i>
                          <p class="m-0">Nicknames</p>
                        </div>
                      </div>
                    </div>
                    '
                            data-bs-html="true">
                            <!-- avatar -->
                            <div class="position-relative">
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <span
                                    class="position-absolute bottom-0 translate-middle p-1 bg-success border border-light rounded-circle"
                                    style="left: 75%">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <!-- name -->
                            <div>
                                <p class="m-0">Jerry <i class="fas fa-angle-down"></i></p>
                                <span class="text-muted fs-7">Active Now</span>
                            </div>
                        </div>
                        <!-- close -->
                        <i class="fas fa-video mx-2 text-muted pointer"></i>
                        <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/3" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/3" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/3" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                    </div>
                    <!-- message input -->
                    <div class="modal-footer p-0 m-0 border-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Aa" />
                            </div>
                            <div class="d-flex align-items-center mx-2">
                                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chat 4 -->
        <div class="modal fade" id="singleChat4" tabindex="-1" aria-labelledby="singleChat4Label" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17" style="transform: translateX(-80px)">
                <div class="modal-content border-0 shadow">
                    <!-- head -->
                    <div class="modal-header">
                        <div class="dropdown-item d-flex rounded" type="button" data-bs-container="body"
                            data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content='
                      <div>
                        <div class="popover-body d-flex flex-column p-0">
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-comment me-3 fs-4"></i>
                            <p class="m-0">Open Messenger App</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-user me-3 fs-4"></i>
                            <p class="m-0">Open Messenger App</p>
                          </div>
                          <hr>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="fas fa-fill-drip me-3 fs-4"></i>
                            <p class="m-0">Color</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="far fa-smile-beam me-3 fs-4"></i>
                            <p class="m-0">Emoji</p>
                          </div>
                          <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                            <i class="fas fa-pencil-alt me-3 fs-4"></i>
                            <p class="m-0">Nicknames</p>
                          </div>
                        </div>
                      </div>
                      '
                            data-bs-html="true">
                            <!-- avatar -->
                            <div class="position-relative">
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <span
                                    class="position-absolute bottom-0 translate-middle p-1 bg-success border border-light rounded-circle"
                                    style="left: 75%">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <!-- name -->
                            <div>
                                <p class="m-0">Tony <i class="fas fa-angle-down"></i></p>
                                <span class="text-muted fs-7">Active Now</span>
                            </div>
                        </div>
                        <!-- close -->
                        <i class="fas fa-video mx-2 text-muted pointer"></i>
                        <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/4" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/4" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/4" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                    </div>
                    <!-- message input -->
                    <div class="modal-footer p-0 m-0 border-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Aa" />
                            </div>
                            <div class="d-flex align-items-center mx-2">
                                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chat 5 -->
        <div class="modal fade" id="singleChat5" tabindex="-1" aria-labelledby="singleChat5Label" aria-hidden="true"
            data-bs-backdrop="false">
            <div class="modal-dialog modal-sm position-absolute bottom-0 end-0 w-17" style="transform: translateX(-80px)">
                <div class="modal-content border-0 shadow">
                    <!-- head -->
                    <div class="modal-header">
                        <div class="dropdown-item d-flex rounded" type="button" data-bs-container="body"
                            data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content='
                          <div>
                            <div class="popover-body d-flex flex-column p-0">
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-comment me-3 fs-4"></i>
                                <p class="m-0">Open Messenger App</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-user me-3 fs-4"></i>
                                <p class="m-0">Open Messenger App</p>
                              </div>
                              <hr>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="fas fa-fill-drip me-3 fs-4"></i>
                                <p class="m-0">Color</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="far fa-smile-beam me-3 fs-4"></i>
                                <p class="m-0">Emoji</p>
                              </div>
                              <div class="d-flex align-items-center dropdown-item p-2 rounded pointer">
                                <i class="fas fa-pencil-alt me-3 fs-4"></i>
                                <p class="m-0">Nicknames</p>
                              </div>
                            </div>
                          </div>
                          '
                            data-bs-html="true">
                            <!-- avatar -->
                            <div class="position-relative">
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <span
                                    class="position-absolute bottom-0 translate-middle p-1 bg-success border border-light rounded-circle"
                                    style="left: 75%">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <!-- name -->
                            <div>
                                <p class="m-0">Phu <i class="fas fa-angle-down"></i></p>
                                <span class="text-muted fs-7">Active Now</span>
                            </div>
                        </div>
                        <!-- close -->
                        <i class="fas fa-video mx-2 text-muted pointer"></i>
                        <i class="fas fa-phone-alt mx-2 text-muted pointer"></i>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body p-0 overflow-auto" style="max-height: 300px">
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/5" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/5" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                        <!-- message l -->
                        <li class="list-group-item border-0 d-flex">
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/random/5" alt="avatar"
                                    class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                        </li>
                        <!-- message r -->
                        <li class="list-group-item border-0 d-flex justify-content-end">
                            <!-- message -->
                            <p class="bg-gray p-2 rounded">Lorem, ipsum dolor</p>
                            <!-- avatar -->
                            <div>
                                <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                    class="rounded-circle ms-2" style="width: 28px; height: 28px; object-fit: cover" />
                            </div>
                        </li>
                    </div>
                    <!-- message input -->
                    <div class="modal-footer p-0 m-0 border-0">
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-plus-circle mx-1 fs-5 text-muted pointer"></i>
                                <i class="far fa-file-image mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-portrait mx-1 fs-5 text-muted pointer"></i>
                                <i class="fas fa-adjust mx-1 fs-5 text-muted pointer"></i>
                            </div>
                            <div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray"
                                    placeholder="Aa" />
                            </div>
                            <div class="d-flex align-items-center mx-2">
                                <i class="fas fa-thumbs-up fs-5 text-muted pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= Main ================= -->
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <!-- ================= Sidebar ================= -->
                <div class="col-12 col-lg-3">
                    <div class="d-none d-lg-block h-100 fixed-top overflow-hidden scrollbar"
                        style="max-width: 265px; width: 100%; z-index: 4">
                        <ul class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5" style="padding-top: 56px">
                            <!-- top -->
                            <!-- avatar -->
                            <li class="dropdown-item p-1 rounded">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">{{ auth()->user()->name }}</p>
                                    </div>
                                </a>
                            </li>
                            <!-- top 1 -->
                            <li class="dropdown-item p-1 rounded">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/tSXYIzZlfrS.png"
                                            alt="from fb" class="rounded-circle"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Friends</p>
                                    </div>
                                </a>
                            </li>
                            <!-- top 2 -->
                            <li class="dropdown-item p-1 rounded">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/Im_0d7HFH4n.png"
                                            alt="from fb" class="rounded-circle"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Groups</p>
                                        <i class="fas fa-circle text-primary" style="font-size: 0.5rem !important"></i>
                                        <span class="fs-7 text-primary"> 1 new</span>
                                    </div>
                                </a>
                            </li>
                            <!-- top 3 -->
                            <li class="dropdown-item p-1">
                                <a href="#"
                                    class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                    <div class="d-flex align-items-center justify-content-evenly">
                                        <div class="p-2">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/0gH3vbvr8Ee.png"
                                                alt="from fb" class="rounded-circle"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                        </div>
                                        <div>
                                            <p class="m-0">Pages</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- top 4 -->
                            <li class="dropdown-item p-1">
                                <a href="#"
                                    class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                    <div class="d-flex align-items-center justify-content-evenly">
                                        <div class="p-2">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v3/y4/r/MN44Sm-CTHN.png"
                                                alt="from fb" class="rounded-circle"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                        </div>
                                        <div>
                                            <p class="m-0">Marketplace</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- top 5 -->
                            <li class="dropdown-item p-1">
                                <a href="#"
                                    class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                    <div class="d-flex align-items-center justify-content-evenly">
                                        <div class="p-2">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v3/y-/r/FhOLTyUFKwf.png"
                                                alt="from fb" class="rounded-circle"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                        </div>
                                        <div>
                                            <p class="m-0">Watch</p>
                                            <i class="fas fa-circle text-primary"
                                                style="font-size: 0.5rem !important"></i>
                                            <span class="fs-7 text-primary"> 9+ new videos</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- see more -->
                            <li class="p-1" type="button">
                                <div id="accordionFlushExample">
                                    <div>
                                        <!-- see more button -->
                                        <div class="d-flex align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            <div class="p-2">
                                                <i class="fas fa-chevron-down rounded-circle p-2"
                                                    style="background-color: #d5d5d5 !important"></i>
                                            </div>
                                            <div>
                                                <p class="m-0">See More</p>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div>
                                                <!-- item 1 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/Y7r38CcFEw5.png"
                                                            alt="from fb" class="rounded-circle"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Campus</p>
                                                    </div>
                                                </div>
                                                <!-- item 2 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yx/r/N7UOh8REweU.png"
                                                            alt="from fb" class="rounded-circle"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Events</p>
                                                    </div>
                                                </div>
                                                <!-- item 3 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yo/r/hLkEFzsCyXC.png"
                                                            alt="from fb" class="rounded-circle"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Newsfeed</p>
                                                    </div>
                                                </div>
                                                <!-- end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <hr class="m-0" />
                            <!-- shortcuts -->
                            <!-- heading -->
                            <div class="d-flex justify-content-between align-items-center mt-2 text-muted edit-heading">
                                <h4 class="m-0 pointer">Your Shorcuts</h4>
                                <p class="m-0 text-primary me-3 pointer edit-button" type="button"
                                    data-bs-toggle="modal" data-bs-target="#shortCutModal">
                                    Edit
                                </p>
                                <!-- modal -->
                                <div class="modal fade" id="shortCutModal" tabindex="-1"
                                    aria-labelledby="shortCutModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <!-- head -->
                                            <div class="modal-header align-items-center">
                                                <h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
                                                    Edit Your ShortCuts
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!-- body -->
                                            <div class="modal-body">
                                                <p class="text-muted">
                                                    Shortcuts provide quick access to what you do most on
                                                    Facebook. Your Shortcuts are sorted automatically, but
                                                    you can pin something so it's always shown at the top
                                                    or hide it from the list.
                                                </p>
                                                <!-- Search -->
                                                <div class="p-1">
                                                    <div class="input-group-text bg-gray border-0 rounded-pill"
                                                        style="min-height: 40px; min-width: 230px">
                                                        <i class="fas fa-search me-2 text-muted"></i>
                                                        <input type="text"
                                                            class="form-control rounded-pill border-0 bg-gray"
                                                            placeholder="Search your Pages, groups, games, and events" />
                                                    </div>
                                                </div>
                                                <!-- short-1 -->
                                                <li class="my-1 p-1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                                        <div class="d-flex align-items-center justify-content-evenly">
                                                            <div class="p-2">
                                                                <img src="https://source.unsplash.com/random/1"
                                                                    alt="from fb"
                                                                    class="rounded border border-1 border-secondary"
                                                                    style="
                                    width: 38px;
                                    height: 38px;
                                    object-fit: cover;
                                  " />
                                                            </div>
                                                            <div>
                                                                <p class="m-0">Lorem Ipsum</p>
                                                            </div>
                                                        </div>
                                                        <select class="form-select w-50 border-0 bg-gray"
                                                            aria-label="Default select example">
                                                            <option selected value="1">
                                                                Short Automatically
                                                            </option>
                                                            <option value="2">Pin To Top</option>
                                                            <option value="3">Hide</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <!-- short-2 -->
                                                <li class="my-1 p-1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                                        <div class="d-flex align-items-center justify-content-evenly">
                                                            <div class="p-2">
                                                                <img src="https://source.unsplash.com/random/2"
                                                                    alt="from fb"
                                                                    class="rounded border border-1 border-secondary"
                                                                    style="
                                    width: 38px;
                                    height: 38px;
                                    object-fit: cover;
                                  " />
                                                            </div>
                                                            <div>
                                                                <p class="m-0">Lorem Ipsum</p>
                                                            </div>
                                                        </div>
                                                        <select class="form-select w-50 border-0 bg-gray"
                                                            aria-label="Default select example">
                                                            <option selected value="1">
                                                                Short Automatically
                                                            </option>
                                                            <option value="2">Pin To Top</option>
                                                            <option value="3">Hide</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <!-- short-3 -->
                                                <li class="my-1 p-1">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between text-decoration-none text-dark">
                                                        <div class="d-flex align-items-center justify-content-evenly">
                                                            <div class="p-2">
                                                                <img src="https://source.unsplash.com/random/3"
                                                                    alt="from fb"
                                                                    class="rounded border border-1 border-secondary"
                                                                    style="
                                    width: 38px;
                                    height: 38px;
                                    object-fit: cover;
                                  " />
                                                            </div>
                                                            <div>
                                                                <p class="m-0">Lorem Ipsum</p>
                                                            </div>
                                                        </div>
                                                        <select class="form-select w-50 border-0 bg-gray"
                                                            aria-label="Default select example">
                                                            <option selected value="1">
                                                                Short Automatically
                                                            </option>
                                                            <option value="2">Pin To Top</option>
                                                            <option value="3">Hide</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <!-- end -->
                                            </div>
                                            <!-- footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light text-primary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                            <!-- short 1 -->
                            <li class="dropdown-item p-1">
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/1" alt="from fb"
                                            class="rounded border border-1 border-secondary"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Lorem Ipsum</p>
                                    </div>
                                </a>
                            </li>
                            <!-- short-2 -->
                            <li class="dropdown-item p-1">
                                <a href="" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/2" alt="from fb"
                                            class="rounded border border-1 border-secondary"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Lorem Ipsum</p>
                                    </div>
                                </a>
                            </li>
                            <!-- short-3 -->
                            <li class="dropdown-item p-1">
                                <a href="" class="d-flex align-items-center text-decoration-none text-dark">
                                    <div class="p-2">
                                        <img src="https://source.unsplash.com/random/3" alt="from fb"
                                            class="rounded border border-1 border-secondary"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                    </div>
                                    <div>
                                        <p class="m-0">Lorem Ipsum</p>
                                    </div>
                                </a>
                            </li>
                            <!-- see more -->
                            <li class="p-1" type="button">
                                <div id="accordionFlushExample">
                                    <div>
                                        <!-- see more button -->
                                        <div class="d-flex align-items-center" data-bs-toggle="collapse"
                                            data-bs-target="#shortModal" aria-expanded="false"
                                            aria-controls="shortModal">
                                            <div class="p-2">
                                                <i class="fas fa-chevron-down rounded-circle p-2"
                                                    style="background-color: #d5d5d5 !important"></i>
                                            </div>
                                            <div>
                                                <p class="m-0">See More</p>
                                            </div>
                                        </div>
                                        <!-- content -->
                                        <div id="shortModal" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div>
                                                <!-- item 1 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://source.unsplash.com/random/4" alt="from fb"
                                                            class="rounded border border-1 border-secondary"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Campus</p>
                                                    </div>
                                                </div>
                                                <!-- item 2 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://source.unsplash.com/random/5" alt="from fb"
                                                            class="rounded border border-1 border-secondary"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Events</p>
                                                    </div>
                                                </div>
                                                <!-- item 3 -->
                                                <div class="d-flex align-items-center dropdown-item p-0 m-0">
                                                    <div class="p-2">
                                                        <img src="https://source.unsplash.com/random/6" alt="from fb"
                                                            class="rounded border border-1 border-secondary"
                                                            style="
                                width: 38px;
                                height: 38px;
                                object-fit: cover;
                              " />
                                                    </div>
                                                    <div>
                                                        <p class="m-0">Newsfeed</p>
                                                    </div>
                                                </div>
                                                <!-- end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- terms -->
                        <div class="p-2 mt-5">
                            <p class="text-muted fs-7">
                                Privacy &#8226; Terms &#8226; Advertising &#8226; Ad Choices
                                &#8226; Cookies &#8226; Talk With You © 2023
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ================= Timeline ================= -->
                <div class="col-12 col-lg-6 pb-5">
                    <div class="d-flex flex-column justify-content-center w-100 mx-auto" style="max-width: 680px">
                        <!-- stories -->
                        <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="false">
                            <div class="carousel-inner">
                                <!-- Carousel Item 1 -->
                                <div class="carousel-item">
                                    <div class="mt-5 d-flex justify-content-between position-relative">
                                        <!-- s 1 -->
                                        <div class="mx-1 bg-white rounded story" type="button"
                                            style="width: 6em; height: 190px">
                                            <img src="{{ Storage::url(auth()->user()->profile_image) }}"
                                                class="card-img-top" alt="story posts"
                                                style="min-height: 125px; object-fit: cover">
                                            <div class="d-flex align-items-center justify-content-center position-relative"
                                                style="min-height: 65px">
                                                <p class="mb-0 text-center fs-7 fw-bold">
                                                    Create Story
                                                </p>
                                                <div class="position-absolute top-0 start-50 translate-middle">
                                                    <i
                                                        class="fas fa-plus-circle fs-3 text-primary bg-white p-1 rounded-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- s 2 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/2" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 3 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/3" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 4 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/4" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 5 -->
                                        <div class="d-none d-lg-block rounded mx-1 story" type="button"
                                            style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/5" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 6 -->
                                        <div class="d-none d-lg-block rounded mx-1 story" type="button"
                                            style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/6" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <div class="mt-5 d-flex justify-content-between position-relative">
                                        <!-- s 7 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/7" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 8 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/8" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 9 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/9" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 10 -->
                                        <div class="rounded mx-1 story" type="button" style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/10" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 11 -->
                                        <div class="d-none d-lg-block rounded mx-1 story" type="button"
                                            style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/11" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                        <!-- s 12 -->
                                        <div class="d-none d-lg-block rounded mx-1 story" type="button"
                                            style="width: 6em; height: 190px">
                                            <img src="https://source.unsplash.com/random/12" class="card-img-top rounded"
                                                alt="story posts" style="min-height: 190px; object-fit: cover">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Previous and Next Controls -->
                            <button class="carousel-control-prev mt-5" type="button"
                                data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next mt-5" type="button"
                                data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <!-- create post -->
                        <div class="bg-white p-3 mt-3 rounded border shadow">
                            <!-- avatar -->
                            <div class="d-flex" type="button">
                                <div class="p-1">
                                    <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="avatar"
                                        class="rounded-circle me-2"
                                        style="width: 38px; height: 38px; object-fit: cover" />
                                </div>
                                <input type="text" class="form-control rounded-pill border-0 bg-gray pointer"
                                    placeholder="What's on your mind, {{ auth()->user()->name }}?" data-bs-toggle="modal"
                                    data-bs-target="#addPost" readonly id="input-area" />
                            </div>

                            <hr />
                            <!-- actions -->
                            <div class="d-flex flex-column flex-lg-row mt-3">
                                <!-- a 1 -->
                                <div class="dropdown-item rounded d-flex align-items-center justify-content-center"
                                    type="button">
                                    <i class="fas fa-video me-2 text-danger"></i>
                                    <p class="m-0 text-muted">Live Video</p>
                                </div>
                                <!-- a 2 -->
                                <div class="dropdown-item rounded d-flex align-items-center justify-content-center"
                                    type="button">
                                    <i class="fas fa-photo-video me-2 text-success"></i>
                                    <p class="m-0 text-muted">Photo/Video</p>
                                </div>
                                <!-- a 3 -->
                                <div class="dropdown-item rounded d-flex align-items-center justify-content-center"
                                    type="button">
                                    <i class="fas fa-smile me-2 text-warning"></i>
                                    <p class="m-0 text-muted">Feeling/Activity</p>
                                </div>
                            </div>
                        </div>
                        <!-- create room -->
                        <div
                            class="bg-white p-3 mt-3 rounded border shadow d-flex justify-content-between position-relative">
                            <!-- btn -->
                            <div>
                                <button class="btn rounded-pill btn-info">
                                    <i class="fas fa-video me-3"></i>Create Room
                                </button>
                            </div>
                            <!-- slider mobile -->
                            <div class="d-lg-none">
                                <img src="https://source.unsplash.com/random/1" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <img src="https://source.unsplash.com/random/2" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <img src="https://source.unsplash.com/random/3" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                                <img src="https://source.unsplash.com/random/4" alt="avatar"
                                    class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                            </div>
                            <!-- slider desktop -->
                            <div class="d-none d-lg-block" style="max-width: 450px">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    data-bs-interval="false">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://source.unsplash.com/random/1" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/2" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/3" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/4" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/5" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/6" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/7" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/8" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/9" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://source.unsplash.com/random/1" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/2" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/3" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/4" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/5" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/6" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/7" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/8" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                            <img src="https://source.unsplash.com/random/9" alt="avatar"
                                                class="rounded-circle me-2"
                                                style="width: 38px; height: 38px; object-fit: cover" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- slider btn -->
                            <div class="position-absolute start-0 top-50 translate-middle d-none d-lg-block"
                                type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <div class="p-2 bg-white border rounded-circle d-flex justify-content-center align-items-center pointer story"
                                    style="width: 30px; height: 30px">
                                    <i class="fas fa-chevron-left text-muted"></i>
                                </div>
                            </div>

                            <div class="position-absolute start-100 top-50 translate-middle d-none d-lg-block"
                                type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <div class="p-2 bg-white border rounded-circle d-flex justify-content-center align-items-center pointer story"
                                    style="width: 30px; height: 30px">
                                    <i class="fas fa-chevron-right text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <!-- posts -->
                        <!-- p 1 -->
                        @foreach ($posts as $post)
                            @auth
                                @include('pages.posts.edit')
                                @include('pages.posts.delete')
                                @include('pages.posts.comment')
                            @endauth
                            @guest
                                @include('pages.posts.comment')
                            @endguest
                            <div class="bg-white rounded p-3 shadow mt-3">

                                <div>
                                    <div class="card border-0">
                                        <div class="body px-2 py-3">
                                            <div class="dropdown">
                                                <a class="btn float-right" href="#" id="menu-button"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    style="cursor: pointer;" data-postid="{{ $post->id }}"><i
                                                        class="far fa-ellipsis-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if (auth()->check() && auth()->user()->id == $post->user->id)
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#editPost{{ $post->id }}"><i
                                                                class="far fa-pen-to-square"></i>
                                                            Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#deletePost{{ $post->id }}"><i
                                                                class="far fa-trash"></i> Delete</a>
                                                    @else
                                                        <a class="dropdown-item" href="#"><i
                                                                class="far fa-bookmark"></i> Save</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="far fa-flag"></i> Report</a>
                                                        <a class="dropdown-item" href="#"><i
                                                                class="far fa-share"></i> Share</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <h6>
                                                <div style="position: absolute; margin-top: -10px;">
                                                    @if (auth()->check() && auth()->user()->id == $post->user->id)
                                                        <a class="text-black" href="/profile">

                                                            <img src="{{ Storage::url($post->user->profile_image) }}"
                                                                alt="Profile Image"
                                                                class="img-fluid rounded-circle mt-2"
                                                                style="width: 50px; height: 50px; border: 3px solid black;"></a>
                                                    @else
                                                        <a class="text-black" href="/user/{{ $post->user->id }}/posts">

                                                            <img src="{{ Storage::url($post->user->profile_image) }}"
                                                                alt="Profile Image"
                                                                class="img-fluid rounded-circle mt-2"
                                                                style="width: 50px; height: 50px; border: 3px solid black;"></a>
                                                    @endif
                                                </div>

                                                <div style="margin-left: 60px;">
                                                    @if (auth()->check() && auth()->user()->id == $post->user->id)
                                                        <a class="text-black" href="/profile">
                                                            {{ $post->user->name }}</a>
                                                    @else
                                                        <a class="text-black" href="/user/{{ $post->user->id }}/posts">
                                                            {{ $post->user->name }}</a>
                                                    @endif
                                                    @if (optional($post->category)->name)
                                                        <span class="text-muted">is
                                                            <i
                                                                class="
                                                            {{ $post->category->id === 1 ? 'far fa-face-smile' : '' }}
                                                            {{ $post->category->id === 2 ? 'far fa-face-frown-slight' : '' }}
                                                            {{ $post->category->id === 3 ? 'far fa-heart-crack' : '' }}
                                                            {{ $post->category->id === 4 ? 'far fa-face-worried' : '' }}
                                                            {{ $post->category->id === 5 ? 'far fa-face-smile-halo' : '' }}
                                                            {{ $post->category->id === 6 ? 'far fa-face-smile-hearts' : '' }}
                                                    "></i>
                                                            {{ optional($post->category)->name }}</span>
                                                    @else
                                                        <span></span>
                                                    @endif
                                                </div>
                                            </h6>
                                            <div>
                                                <span class="text-muted"
                                                    style="margin-left: 60px;">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                            <h5 class="mt-4">{{ $post->content }}</h5>
                                            @if (is_array($post->post_image) && count($post->post_image) > 0)
                                                @if (count($post->post_image) == 1)
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#commentPost{{ $post->id }}">
                                                        <img src="{{ Storage::url($post->post_image[0]) }}"
                                                            style="width: 100%;" alt="post image">
                                                    </a>
                                                @elseif (count($post->post_image) == 2)
                                                    <div class="row">
                                                        @foreach ($post->post_image as $index => $imagePath)
                                                            <div class="col-md-6 col-sm-6 col-6">
                                                                <div class="mb-4">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#commentPost{{ $post->id }}">
                                                                        <img src="{{ Storage::url($imagePath) }}"
                                                                            class="img-fluid" alt="post image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="row">

                                                        <div class="col-md-8 col-sm-8 col-8">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#commentPost{{ $post->id }}">
                                                                <img src="{{ Storage::url($post->post_image[0]) }}"
                                                                    class="img-fluid" alt="post image">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            @foreach ($post->post_image as $index => $imagePath)
                                                                @if ($index > 0 && $index <= 3)
                                                                    <div class="mb-4">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#commentPost{{ $post->id }}">
                                                                            <img src="{{ Storage::url($imagePath) }}"
                                                                                class="img-fluid" alt="post image"
                                                                                style="height: 130px; width: 130px;">
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                            @if (count($post->post_image) > 4)
                                                                <div class="col-md-12 col-sm-4">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#commentPost{{ $post->id }}">
                                                                        <div class="img-fluid"
                                                                            style="position: absolute; margin-top: -154px; margin-left: -15px; background-color: rgba(80, 82, 82, 0.473); height: 130px; width: 130px;">
                                                                            <h1 class="text-center text-white align-items-center"
                                                                                style="margin-top: 38px;">
                                                                                <strong>+{{ count($post->post_image) - 4 }}</strong>
                                                                            </h1>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="d-flex justify-content-between px-3">
                                            <span>
                                                @if ($post->likes->contains('user_id', auth()->id()))
                                                    <i class="fas fa-thumbs-up text-primary"></i>
                                                    <span class="text-primary">You</span>
                                                    @if ($post->likes->count() > 1)
                                                        , and {{ $post->likes->count() - 1 }} @if ($post->likes->count() - 1 == 1)
                                                            other
                                                        @else
                                                            others
                                                        @endif
                                                    @endif
                                                @elseif($post->likes->count() == 1)
                                                    <i class="far fa-thumbs-up text-blue"></i>
                                                    {{ $post->likes->count() }} like this post
                                                @elseif($post->likes->count() >= 2)
                                                    <i class="far fa-thumbs-up text-blue"></i>
                                                    {{ $post->likes->count() }} likes this post
                                                @endif
                                            </span>
                                            <span>
                                                @if ($post->comments->count() >= 1)
                                                    {{ $post->comments->count() }}
                                                    @if ($post->comments->count() == 1)
                                                        comment <i class="far fa-comment-dots"></i>
                                                    @else
                                                        comments <i class="far fa-comment-dots"></i>
                                                    @endif
                                                @endif
                                            </span>
                                        </div>
                                        <footer class="p-3">
                                            <div
                                                class="d-flex justify-content-between align-items-center border-top border-bottom">
                                                @if (auth()->check() && $post->likes->contains('user_id', auth()->id()))
                                                    <form
                                                        action="{{ route('post.unlike', $post->likes->where('user_id', auth()->id())->first()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn text-primary mt-3">
                                                            <i class="fas fa-thumbs-up"></i> Like
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('post.like') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="post_id" id="post_id"
                                                            value="{{ $post->id }}">
                                                        <button type="submit" class="btn mt-3">
                                                            <i class="far fa-thumbs-up"></i> Like
                                                        </button>

                                                    </form>
                                                @endif
                                                <div>
                                                    <button class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#commentPost{{ $post->id }}"><i
                                                            class="far fa-comment"></i>
                                                        Comment</button>
                                                </div>
                                                <div>

                                                    <button class="btn"><i class="far fa-share"></i> Share</button>
                                                </div>
                                            </div>
                                        </footer>

                                        @if ($latestComment = $post->comments->last())
                                            <div class="mb-2">
                                                <div style="position: absolute;" class="mt-4">
                                                    @if (auth()->check() && auth()->user()->id == $latestComment->user->id)
                                                        <a class="text-black" href="/profile">

                                                            <img src="{{ Storage::url($latestComment->user->profile_image) }}"
                                                                alt="Profile Image"
                                                                class="img-fluid rounded-circle mt-2"
                                                                style="width: 45px; height: 45px; border: 3px solid black;"></a>
                                                    @else
                                                        <a class="text-black"
                                                            href="/user/{{ $latestComment->user->id }}/posts">

                                                            <img src="{{ Storage::url($latestComment->user->profile_image) }}"
                                                                alt="Profile Image"
                                                                class="img-fluid rounded-circle mt-2"
                                                                style="width: 45px; height: 45px; border: 3px solid black;"></a>
                                                    @endif
                                                </div>

                                                <div class="ml-5">
                                                    <footer class="px-4 py-2 border mb-2 mt-3 footer-comment">
                                                        @if (auth()->check() && auth()->user()->id == $latestComment->user->id)
                                                            <a class="text-black" href="/profile">
                                                                {{ $latestComment->user->name }}</a>
                                                        @else
                                                            <a class="text-black"
                                                                href="/user/{{ $latestComment->user->id }}/posts">
                                                                {{ $latestComment->user->name }}</a>
                                                        @endif <br>
                                                        <span class="text-wrap">
                                                            {{ $latestComment->user_comment }}
                                                        </span>

                                                    </footer>
                                                    <div class="d-flex gap-3"
                                                        style="margin-top: -8px; margin-left: 20px;">
                                                        <a>Like</a>
                                                        <a>Reply</a>
                                                        <h6>
                                                            {{ $latestComment->created_at->diffForHumans() }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($posts->count() === 0)
                            <p class="text-muted text-center">
                                No posts yet
                            </p>
                        @endif
                    </div>
                </div>
                <!-- ================= Chatbar ================= -->
                <div class="col-12 col-lg-3">
                    <div class="d-none d-lg-block h-100 fixed-top end-0 overflow-hidden scrollbar"
                        style="
              max-width: 275px;
              width: 100%;
              z-index: 4;
              padding-top: 56px;
              left: initial !important;
            ">
                        <div class="p-3 mt-4">
                            <!-- sponsors -->
                            <h5 class="text-muted">Sponsored</h5>
                            <!-- s 1 -->
                            <li class="dropdown-item my-2 d-flex justify-content-between">
                                <!-- img -->
                                <a href="#" class="d-flex align-items-center text-decoration-none link-dark">
                                    <img src="https://source.unsplash.com/random/1" alt="ads"
                                        style="width: 100px; height: 100px; object-fit: cover" class="rounded me-3" />
                                    <div>
                                        <p class="m-0">Lorem ipsum</p>
                                        <span class="text-muted fs-7">loremipsum.com</span>
                                    </div>
                                </a>
                                <!-- icon -->
                                <div class="rounded-circle p-1 bg-white d-flex align-items-center justify-content-center mx-2 sponsor-icon nav-item"
                                    type="button" style="width: 38px; height: 38px">
                                    <i class="fas fa-ellipsis-h text-muted p-2" data-bs-toggle="dropdown"></i>
                                    <!-- menu -->
                                    <ul class="dropdown-menu">
                                        <!-- item 1 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="far fa-window-close"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Hide Ad</p>
                                                    <span class="text-muted fs-7">Never see this add again.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- item 2 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Report Ad</p>
                                                    <span class="text-muted fs-7">Tell us a problem with this add.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- item 3 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="fas fa-info-circle"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Why am I seeing this ad?</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- s 2 -->
                            <li class="dropdown-item my-2 d-flex justify-content-between">
                                <!-- img -->
                                <a href="#" class="d-flex align-items-center text-decoration-none link-dark">
                                    <img src="https://source.unsplash.com/random/2" alt="ads"
                                        style="width: 100px; height: 100px; object-fit: cover" class="rounded me-3" />
                                    <div>
                                        <p class="m-0">Lorem ipsum</p>
                                        <span class="text-muted fs-7">loremipsum.com</span>
                                    </div>
                                </a>
                                <!-- icon -->
                                <div class="rounded-circle p-1 bg-white d-flex align-items-center justify-content-center mx-2 sponsor-icon nav-item"
                                    type="button" style="width: 38px; height: 38px">
                                    <i class="fas fa-ellipsis-h text-muted p-2" data-bs-toggle="dropdown"></i>
                                    <!-- menu -->
                                    <ul class="dropdown-menu">
                                        <!-- item 1 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="far fa-window-close"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Hide Ad</p>
                                                    <span class="text-muted fs-7">Never see this add again.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- item 2 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="fas fa-exclamation-triangle"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Report Ad</p>
                                                    <span class="text-muted fs-7">Tell us a problem with this add.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- item 3 -->
                                        <li class="dropdown-item">
                                            <a href="#"
                                                class="d-flex align-items-center text-decoration-none text-dark">
                                                <i class="fas fa-info-circle"></i>
                                                <div class="ms-3">
                                                    <p class="m-0">Why am I seeing this ad?</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- contacts -->
                            <hr class="m-0" />
                            <div class="my-3 d-flex justify-content-between align-items-center">
                                <p class="text-muted fs-5 m-0">Contacts</p>
                                <!-- icons -->
                                <div class="text-muted">
                                    <!-- video room -->
                                    <i class="fas fa-video mx-2 pointer" type="button" data-bs-toggle="modal"
                                        data-bs-target="#videoRoomD"></i>
                                    <!-- video room modal -->
                                    <div class="modal fade" id="videoRoomD" tabindex="-1"
                                        aria-labelledby="videoRoomDLabel" aria-hidden="true" data-bs-backdrop="false">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content bg-dark">
                                                <!-- header -->
                                                <div class="modal-header border-0">
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <!-- body -->
                                                <div class="modal-body d-flex flex-column align-items-center justify-content-center"
                                                    style="min-height: 400px">
                                                    <i class="fas fa-video fs-0"></i>
                                                    <h3 class="text-white">Schedule A Room For Later</h3>
                                                    <p class="text-white text-center w-50 mx-auto">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing
                                                        elit. Ut deserunt alias laudantium itaque eius enim
                                                        natus culpa eligendi consectetur maiores!
                                                    </p>
                                                    <button class="btn btn-lg btn-primary rounded-pill">
                                                        Schedule Room
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- new chat -->
                                    <i class="fas fa-search mx-2 pointer" type="button" data-bs-toggle="modal"
                                        data-bs-target="#newChat"></i>
                                    <!-- chat settings -->
                                    <i class="fas fa-ellipsis-h pointer text-muted mx-2" type="button"
                                        data-bs-toggle="dropdown"></i>
                                    <!-- chat setting dd -->
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
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
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
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
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
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked"></label>
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
                                </div>
                            </div>
                            <!-- friend 1 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat1">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                    <div>
                      <div class="popover-body d-flex p-2">
                        <div>
                          <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                        </div>
                        <div >
                          <h5>Mike</h5>
                          <div class="d-flex">
                            <i class="fas fa-user-friends m-1 text-muted"></i>
                            <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                          </div>
                          <div class="d-flex">
                          <i class="fas fa-graduation-cap m-1 text-muted"></i>
                          <p>Studies at MIT</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Mike</p>
                                </div>
                            </li>
                            <!-- friend 2 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat2">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                          <div>
                            <div class="popover-body d-flex p-2">
                              <div>
                                <img src="https://source.unsplash.com/random/2" alt="avatar" class="pop-avatar"  />
                              </div>
                              <div >
                                <h5>Tuan</h5>
                                <div class="d-flex">
                                  <i class="fas fa-user-friends m-1 text-muted"></i>
                                  <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                </div>
                                <div class="d-flex">
                                <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                <p>Studies at MIT</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/2" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tuan</p>
                                </div>
                            </li>
                            <!-- friend 3 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat3">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                              <div>
                                <div class="popover-body d-flex p-2">
                                  <div>
                                    <img src="https://source.unsplash.com/random/3" alt="avatar" class="pop-avatar"  />
                                  </div>
                                  <div >
                                    <h5>Jerry</h5>
                                    <div class="d-flex">
                                      <i class="fas fa-user-friends m-1 text-muted"></i>
                                      <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                    </div>
                                    <div class="d-flex">
                                    <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                    <p>Studies at MIT</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/3" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Jerry</p>
                                </div>
                            </li>
                            <!-- friend 4 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat4">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                          <div>
                            <div class="popover-body d-flex p-2">
                              <div>
                                <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                              </div>
                              <div >
                                <h5>Tony</h5>
                                <div class="d-flex">
                                  <i class="fas fa-user-friends m-1 text-muted"></i>
                                  <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                </div>
                                <div class="d-flex">
                                <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                <p>Studies at MIT</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tony</p>
                                </div>
                            </li>
                            <!-- friend 5 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat5">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                      <div>
                        <div class="popover-body d-flex p-2">
                          <div>
                            <img src="https://source.unsplash.com/random/5" alt="avatar" class="pop-avatar"  />
                          </div>
                          <div >
                            <h5>Phu</h5>
                            <div class="d-flex">
                              <i class="fas fa-user-friends m-1 text-muted"></i>
                              <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                            </div>
                            <div class="d-flex">
                            <i class="fas fa-graduation-cap m-1 text-muted"></i>
                            <p>Studies at MIT</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/5" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Phu</p>
                                </div>
                            </li>
                            <!-- friend 6 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat1">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                                  <div>
                                    <div class="popover-body d-flex p-2">
                                      <div>
                                        <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                                      </div>
                                      <div >
                                        <h5>Mike</h5>
                                        <div class="d-flex">
                                          <i class="fas fa-user-friends m-1 text-muted"></i>
                                          <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                        </div>
                                        <div class="d-flex">
                                        <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                        <p>Studies at MIT</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Mike</p>
                                </div>
                            </li>
                            <!-- friend 7 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat2">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                                        <div>
                                          <div class="popover-body d-flex p-2">
                                            <div>
                                              <img src="https://source.unsplash.com/random/2" alt="avatar" class="pop-avatar"  />
                                            </div>
                                            <div >
                                              <h5>Tuan</h5>
                                              <div class="d-flex">
                                                <i class="fas fa-user-friends m-1 text-muted"></i>
                                                <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                              </div>
                                              <div class="d-flex">
                                              <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                              <p>Studies at MIT</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/2" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tuan</p>
                                </div>
                            </li>
                            <!-- friend 8 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat3">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                                            <div>
                                              <div class="popover-body d-flex p-2">
                                                <div>
                                                  <img src="https://source.unsplash.com/random/3" alt="avatar" class="pop-avatar"  />
                                                </div>
                                                <div >
                                                  <h5>Jerry</h5>
                                                  <div class="d-flex">
                                                    <i class="fas fa-user-friends m-1 text-muted"></i>
                                                    <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                                  </div>
                                                  <div class="d-flex">
                                                  <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                                  <p>Studies at MIT</p>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/3" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Jerry</p>
                                </div>
                            </li>
                            <!-- friend 9 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat4">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                                        <div>
                                          <div class="popover-body d-flex p-2">
                                            <div>
                                              <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                                            </div>
                                            <div >
                                              <h5>Tony</h5>
                                              <div class="d-flex">
                                                <i class="fas fa-user-friends m-1 text-muted"></i>
                                                <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                              </div>
                                              <div class="d-flex">
                                              <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                              <p>Studies at MIT</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tony</p>
                                </div>
                            </li>
                            <!-- friend 10 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat5">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                                    <div>
                                      <div class="popover-body d-flex p-2">
                                        <div>
                                          <img src="https://source.unsplash.com/random/5" alt="avatar" class="pop-avatar"  />
                                        </div>
                                        <div >
                                          <h5>Phu</h5>
                                          <div class="d-flex">
                                            <i class="fas fa-user-friends m-1 text-muted"></i>
                                            <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                          </div>
                                          <div class="d-flex">
                                          <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                          <p>Studies at MIT</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/5" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Phu</p>
                                </div>
                            </li>
                            <!-- friend 11 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat1">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                    <div>
                      <div class="popover-body d-flex p-2">
                        <div>
                          <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                        </div>
                        <div >
                          <h5>Mike</h5>
                          <div class="d-flex">
                            <i class="fas fa-user-friends m-1 text-muted"></i>
                            <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                          </div>
                          <div class="d-flex">
                          <i class="fas fa-graduation-cap m-1 text-muted"></i>
                          <p>Studies at MIT</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Mike</p>
                                </div>
                            </li>
                            <!-- friend 12 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat2">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                          <div>
                            <div class="popover-body d-flex p-2">
                              <div>
                                <img src="https://source.unsplash.com/random/2" alt="avatar" class="pop-avatar"  />
                              </div>
                              <div >
                                <h5>Tuan</h5>
                                <div class="d-flex">
                                  <i class="fas fa-user-friends m-1 text-muted"></i>
                                  <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                </div>
                                <div class="d-flex">
                                <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                <p>Studies at MIT</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/2" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tuan</p>
                                </div>
                            </li>
                            <!-- friend 13 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat3">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                              <div>
                                <div class="popover-body d-flex p-2">
                                  <div>
                                    <img src="https://source.unsplash.com/random/3" alt="avatar" class="pop-avatar"  />
                                  </div>
                                  <div >
                                    <h5>Jerry</h5>
                                    <div class="d-flex">
                                      <i class="fas fa-user-friends m-1 text-muted"></i>
                                      <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                    </div>
                                    <div class="d-flex">
                                    <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                    <p>Studies at MIT</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/3" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Jerry</p>
                                </div>
                            </li>
                            <!-- friend 14 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat4">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                          <div>
                            <div class="popover-body d-flex p-2">
                              <div>
                                <img src="https://source.unsplash.com/random/4" alt="avatar" class="pop-avatar"  />
                              </div>
                              <div >
                                <h5>Tony</h5>
                                <div class="d-flex">
                                  <i class="fas fa-user-friends m-1 text-muted"></i>
                                  <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                                </div>
                                <div class="d-flex">
                                <i class="fas fa-graduation-cap m-1 text-muted"></i>
                                <p>Studies at MIT</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/4" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Tony</p>
                                </div>
                            </li>
                            <!-- friend 15 -->
                            <li class="dropdown-item rounded my-2 px-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#singleChat5">
                                <!-- avatar -->
                                <div class="d-flex align-items-center mx-2 chat-avatar" data-bs-custom-class="chat-box"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                                    data-bs-trigger="hover"
                                    data-bs-content='
                      <div>
                        <div class="popover-body d-flex p-2">
                          <div>
                            <img src="https://source.unsplash.com/random/5" alt="avatar" class="pop-avatar"  />
                          </div>
                          <div >
                            <h5>Phu</h5>
                            <div class="d-flex">
                              <i class="fas fa-user-friends m-1 text-muted"></i>
                              <p>2 mutual friends: <span class="fw-bold">Jerry</span> and <span class="fw-bold">Phu</span></p>
                            </div>
                            <div class="d-flex">
                            <i class="fas fa-graduation-cap m-1 text-muted"></i>
                            <p>Studies at MIT</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    '
                                    data-bs-html="true">
                                    <div class="position-relative">
                                        <img src="https://source.unsplash.com/random/5" alt="avatar"
                                            class="rounded-circle me-2"
                                            style="width: 38px; height: 38px; object-fit: cover" />
                                        <span
                                            class="position-absolute bottom-0 translate-middle border border-light rounded-circle bg-success p-1"
                                            style="left: 75%">
                                            <span class="visually-hidden"></span>
                                        </span>
                                    </div>
                                    <p class="m-0">Phu</p>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= Chat Icon ================= -->
        <div class="fixed-bottom right-100 p-3" style="z-index: 6; left: initial" type="button"
            data-bs-toggle="modal" data-bs-target="#newChat">
            <i class="fas fa-edit bg-white rounded-circle p-3 shadow"></i>
        </div>


    </div>
    {{-- @auth
        <div class="d-flex justify-content-center mt-4 mb-5">
            <div class="card col-md-6 col-sm-6 p-3">
                <input type="text" class="form-control" readonly style="border-radius: 20px; cursor: pointer;"
                    placeholder="What's on your mind, {{ auth()->user()->name }}?" data-bs-toggle="modal"
                    data-bs-target="#addPost" id="input-area">
            </div>
        </div>
    @endauth
    @foreach ($posts as $post)
        @auth
            @include('pages.posts.edit')
            @include('pages.posts.delete')
            @include('pages.posts.comment')
        @endauth
        @guest
            @include('pages.posts.comment')
        @endguest
        <div class="d-flex justify-content-center mt-3">
            <div class="card col-md-6 col-sm-6">
                <div class="body px-2 py-3">
                    <div class="dropdown">
                        <a class="btn float-right" href="#" id="menu-button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"
                            data-postid="{{ $post->id }}"><i class="far fa-ellipsis-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (auth()->check() && auth()->user()->id == $post->user->id)
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#editPost{{ $post->id }}"><i class="far fa-pen-to-square"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                    data-bs-target="#deletePost{{ $post->id }}"><i class="far fa-trash"></i> Delete</a>
                            @else
                                <a class="dropdown-item" href="#"><i class="far fa-bookmark"></i> Save</a>
                                <a class="dropdown-item" href="#"><i class="far fa-flag"></i> Report</a>
                                <a class="dropdown-item" href="#"><i class="far fa-share"></i> Share</a>
                            @endif
                        </div>
                    </div>
                    <h6>
                        <div style="position: absolute; margin-top: -10px;">
                            @if (auth()->check() && auth()->user()->id == $post->user->id)
                                <a class="text-black" href="/profile">

                                    <img src="{{ Storage::url($post->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle mt-2"
                                        style="width: 50px; height: 50px; border: 3px solid black;"></a>
                            @else
                                <a class="text-black" href="/user/{{ $post->user->id }}/posts">

                                    <img src="{{ Storage::url($post->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle mt-2"
                                        style="width: 50px; height: 50px; border: 3px solid black;"></a>
                            @endif
                        </div>

                        <div style="margin-left: 60px;">
                            @if (auth()->check() && auth()->user()->id == $post->user->id)
                                <a class="text-black" href="/profile">
                                    {{ $post->user->name }}</a>
                            @else
                                <a class="text-black" href="/user/{{ $post->user->id }}/posts">
                                    {{ $post->user->name }}</a>
                            @endif
                            @if (optional($post->category)->name)
                                <span class="text-muted">is
                                    <i
                                        class="
                                        {{ $post->category->id === 1 ? 'far fa-face-smile' : '' }}
                                        {{ $post->category->id === 2 ? 'far fa-face-frown-slight' : '' }}
                                        {{ $post->category->id === 3 ? 'far fa-heart-crack' : '' }}
                                        {{ $post->category->id === 4 ? 'far fa-face-worried' : '' }}
                                        {{ $post->category->id === 5 ? 'far fa-face-smile-halo' : '' }}
                                        {{ $post->category->id === 6 ? 'far fa-face-smile-hearts' : '' }}
                                "></i>
                                    {{ optional($post->category)->name }}</span>
                            @else
                                <span></span>
                            @endif
                        </div>
                    </h6>
                    <div>
                        <span class="text-muted"
                            style="margin-left: 60px;">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h5 class="mt-4">{{ $post->content }}</h5>
                    @if (is_array($post->post_image) && count($post->post_image) > 0)
                        @if (count($post->post_image) == 1)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#commentPost{{ $post->id }}">
                                <img src="{{ Storage::url($post->post_image[0]) }}" style="width: 100%;"
                                    alt="post image">
                            </a>
                        @elseif (count($post->post_image) == 2)
                            <div class="row">
                                @foreach ($post->post_image as $index => $imagePath)
                                    <div class="col-md-6 col-sm-6 col-6">
                                        <div class="mb-4">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#commentPost{{ $post->id }}">
                                                <img src="{{ Storage::url($imagePath) }}" class="img-fluid"
                                                    alt="post image">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row">

                                <div class="col-md-8 col-sm-8 col-8">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#commentPost{{ $post->id }}">
                                        <img src="{{ Storage::url($post->post_image[0]) }}" class="img-fluid"
                                            alt="post image">
                                    </a>
                                </div>
                                <div class="col-md-4 col-sm-4 col-4">
                                    @foreach ($post->post_image as $index => $imagePath)
                                        @if ($index > 0 && $index <= 3)
                                            <div class="mb-4">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#commentPost{{ $post->id }}">
                                                    <img src="{{ Storage::url($imagePath) }}" class="img-fluid"
                                                        alt="post image" style="height: 130px; width: 130px;">
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                    @if (count($post->post_image) > 4)
                                        <div class="col-md-12 col-sm-4">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#commentPost{{ $post->id }}">
                                                <div class="img-fluid"
                                                    style="position: absolute; margin-top: -154px; margin-left: -15px; background-color: rgba(80, 82, 82, 0.473); height: 130px; width: 130px;">
                                                    <h1 class="text-center text-white align-items-center"
                                                        style="margin-top: 38px;">
                                                        <strong>+{{ count($post->post_image) - 4 }}</strong>
                                                    </h1>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="d-flex justify-content-between px-3">
                    <span>
                        @if ($post->likes->contains('user_id', auth()->id()))
                            <i class="fas fa-thumbs-up text-primary"></i>
                            <span class="text-primary">You</span>
                            @if ($post->likes->count() > 1)
                                , and {{ $post->likes->count() - 1 }} @if ($post->likes->count() - 1 == 1)
                                    other
                                @else
                                    others
                                @endif
                            @endif
                        @elseif($post->likes->count() == 1)
                            <i class="far fa-thumbs-up text-blue"></i>
                            {{ $post->likes->count() }} like this post
                        @elseif($post->likes->count() >= 2)
                            <i class="far fa-thumbs-up text-blue"></i>
                            {{ $post->likes->count() }} likes this post
                        @endif
                    </span>
                    <span>
                        @if ($post->comments->count() >= 1)
                            {{ $post->comments->count() }}
                            @if ($post->comments->count() == 1)
                                comment <i class="far fa-comment-dots"></i>
                            @else
                                comments <i class="far fa-comment-dots"></i>
                            @endif
                        @endif
                    </span>
                </div>
                <footer class="p-3">
                    <div class="d-flex justify-content-between align-items-center border-top border-bottom">
                        @if (auth()->check() && $post->likes->contains('user_id', auth()->id()))
                            <form
                                action="{{ route('post.unlike', $post->likes->where('user_id', auth()->id())->first()) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-primary mt-3">
                                    <i class="fas fa-thumbs-up"></i> Like
                                </button>
                            </form>
                        @else
                            <form action="{{ route('post.like') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                <button type="submit" class="btn mt-3">
                                    <i class="far fa-thumbs-up"></i> Like
                                </button>

                            </form>
                        @endif
                        <div>
                            <button class="btn" data-bs-toggle="modal"
                                data-bs-target="#commentPost{{ $post->id }}"><i class="far fa-comment"></i>
                                Comment</button>
                        </div>
                        <div>

                            <button class="btn"><i class="far fa-share"></i> Share</button>
                        </div>
                    </div>
                </footer>

                @if ($latestComment = $post->comments->last())
                    <div class="mb-2">
                        <div style="position: absolute;" class="mt-4">
                            @if (auth()->check() && auth()->user()->id == $latestComment->user->id)
                                <a class="text-black" href="/profile">

                                    <img src="{{ Storage::url($latestComment->user->profile_image) }}"
                                        alt="Profile Image" class="img-fluid rounded-circle mt-2"
                                        style="width: 45px; height: 45px; border: 3px solid black;"></a>
                            @else
                                <a class="text-black" href="/user/{{ $latestComment->user->id }}/posts">

                                    <img src="{{ Storage::url($latestComment->user->profile_image) }}"
                                        alt="Profile Image" class="img-fluid rounded-circle mt-2"
                                        style="width: 45px; height: 45px; border: 3px solid black;"></a>
                            @endif
                        </div>

                        <div class="ml-5">
                            <footer class="px-4 py-2 border mb-2 mt-3 footer-comment">
                                @if (auth()->check() && auth()->user()->id == $latestComment->user->id)
                                    <a class="text-black" href="/profile">
                                        {{ $latestComment->user->name }}</a>
                                @else
                                    <a class="text-black" href="/user/{{ $latestComment->user->id }}/posts">
                                        {{ $latestComment->user->name }}</a>
                                @endif <br>
                                <span class="text-wrap">
                                    {{ $latestComment->user_comment }}
                                </span>

                            </footer>
                            <div class="d-flex gap-3" style="margin-top: -8px; margin-left: 20px;">
                                <a>Like</a>
                                <a>Reply</a>
                                <h6>
                                    {{ $latestComment->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    @if ($posts->count() === 0)
        <p class="text-muted text-center">
            No posts yet
        </p>
    @endif --}}
@endsection

<style>
    #input-area:disabled,
    #input-area[readonly] {
        background-color: rgb(250, 248, 248);
        opacity: 1;
    }

    #menu-button {
        display: none;
    }

    .card:hover #menu-button {
        display: block;
    }
</style>
