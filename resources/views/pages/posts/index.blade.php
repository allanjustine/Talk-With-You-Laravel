@extends('layout.base')

@section('title')
    Posts
@endsection


@section('content')
    @auth
        @include('pages.posts.create')
    @endauth
    <div class="position-relative">
        <div class="d-flex flex-column justify-content-center w-100 mx-auto" style="max-width: 680px">
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
        </div>

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
                style="transform: translateX(-50px)">
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
                @auth
                    <div class="col-12 col-lg-3">
                        <div class="d-none d-lg-block h-100 fixed-top overflow-hidden scrollbar"
                            style="max-width: 265px; width: 100%; z-index: 4">
                            <ul class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5" style="padding-top: 56px">
                                <!-- top -->
                                <!-- avatar -->
                                <li class="dropdown-item p-1 rounded">
                                    <a href="#" class="d-flex align-items-center text-decoration-none text-dark">
                                        <div class="p-2">
                                            <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="avatar"
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
                                            <img src="https://cdn-icons-png.flaticon.com/512/4951/4951185.png" alt="from fb"
                                                class="rounded-circle" style="width: 38px; height: 38px; object-fit: cover" />
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
                                            <img src="https://cdn-icons-png.flaticon.com/512/166/166258.png" alt="from fb"
                                                class="rounded-circle" style="width: 38px; height: 38px; object-fit: cover" />
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
                                                <img src="https://cdn-icons-png.flaticon.com/512/5692/5692284.png"
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
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAvVBMVEXz9PgquaVBcbn59vsat6Kl2tWb2NLv9PgGtqD3+Pr8+/w4bLeVq9I/crh4lsc5bbaHpMspvKWiuNZCbbo5jbJBdbctsqhsyryx39u/5OHo8vQwqqwzn602l686ibIvsKsruKc8grSFn8vU6+tUxbR4zcE/v62P1crL6Obe7u9ryb2A0MRIwK+e2dM4krE0nK0+fbY+frWUtNI6hrMyo6sqtaY5Z7g/eLbW3+2/zeRUfrzI1OXj6PJhh8CasNKDppwAAAAELElEQVR4nO2da0/iQBSG6Uy1hS7WsRflIlhRFO+uuCi6+/9/1g5QELAXPzDnoHmfxMTkZJrz9EzbM9MmVCoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfh5SVpxNMzno1tC7OLPcTdM/bzjb4SgHh7ZtW5vHdvtH26AojywTejPcQ4fbryJvXWN+GvuGW1E2jApqxUPmido066dxd1gV5YW5a3AB6zw1X0LmIsoGQQlZr0R5TWBoWU0+Q6dPIegyPvd7hh8VM+xzNkO5SzJJGe+m8oxG0L3kKmKTZJLqaXrBZCiPiCap1ecyPKcydAc8hjTPigk2U1tzSVVCyz5jMSTpuufwTNMzOkObpa0ZEJaQpa2RO4SGVp+j+74iFGRpaxzKEnK0Nca3oNa4oRakWvwuoG9rJKmfnqa31NOUZvG7BHVbQ7b4XeASPy8kYUMzg7qtGRD7kW8q0i1+P6Bta+gWvx+4Dcoi0i1+P7CvKQ3pFr9LUL5KJF38LnB7hIY3DIKWvUs3TQeuzYBL2H33bnc4uKUzrEgeCA1/Pj++hoNdFuiuQ3nEci+1XbJHPkffPYFuichmSFdD4n22BVSCk56GRZByq+aEQ5By+cSxANaGhEvg4guxGxcEVUsVRFtFhrTbGAVbbapzly+hWvUCQzUq8Kd9dVH0yV4sovwiqiS4z5VQ7eChwJ92w1Re5SmqRASdvDy1Q4H/cyTy/cm/bnNybqfqOBC5eaq4LoRIcs+NHlrvZg91yd8Cy+w9YXWvs9SKw6w8lS7SJJhdYhVOh0ZxVtS+ol8cyl7/80RNBTXtz3mqeDSLBh0rwyJMh0YZVXTPOT7ek83DtVSUFXpizp1ajSo1jOax4HHdQsXJ/NyI+vrZUYr81VpKrRMvaSjVjhZZagt9518OdpOloD4BJx9R/d+xWB6adFeGDn/XeAQrNeE/DZ91CpqT7vFoRWHieNw9mQatuJ343mpQhK3ZUOu5FYrVoV6QtOP5ce8f/vyqchnWhR/UH5/CsJOM/DW/qUYwSjph+PQgAj8jGD3qYOcxCj4P1Ud7mB5XDxUep+EsmyBDYJ6qVxCcDC0K6r9pSbkNjQNDGMIQhjD86YZ+KV7pMbbasL5/UMZeqeI2G/ovtWoZtYMyxS029Pe+sihwvrPh/ldSq+a3pjA0DQxhmAJDGBoEhjBMgSEMDQJDGKbAEIYGgSEMU2AIQ4PAEIYpMIShQWAIwxQYwtAgMIRhCgw5DaOS1L6/4bgkt00ZHrAZ7hEZvnIZVl9LvoTZkKF4N66ShzOmMOS7DHVub8XJbcTQH3P+dICep0XpbcLQG7/zlXCS3ctfr4CvGeaP9z3/1GEV1OlV3v7t5fKl23w1f/zpAW8B0wSLIDoCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgO/Df38QmP/CL1gcAAAAAElFTkSuQmCC"
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
                                                <img src="https://media.licdn.com/dms/image/C4D12AQFPTSR2j1EaXw/article-cover_image-shrink_720_1280/0/1524760798842?e=2147483647&v=beta&t=djqR8vrzUpKRyJRv8_jLoUHeGn0uYB9wBsLqxHcOEaE"
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
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN8AAADiCAMAAAD5w+JtAAAA8FBMVEXeCT/t7e3+/v7////4+Pjz8/PWADf/+//36u/v7+/29vbYBz77+/vbgJb//P7DNVnMK1P/u9DPADvSJlLbiZ/z6+7/+f/TIk75xdX8rsP/1OP4t8fee5Png5v/5PPeCUH/6O3dZ4TeX33torfTEUPyhZ/pi6LHADv/3+r/8fr5wtHGCT+6ADn/6PT/2uX/2+zTRWjkkqfXbofESGj3s8XFRWTaVnbTTGzWYH3SaYS6GEL9pbzsorfmco71kKjsYIP6eZndPmTeMVvglqraH07SdYzGXXnfSG3uaYjyuc/ebojBKlDCO1y7IkrTOF/eU3R2FxY0AAAPK0lEQVR4nO2dDXuiSBKAEeOAdtJiJyBiZiTRUZDVaMaJXiaTvbvZmdv5WPf//5vjUyhoQAxJgLWe7O6zlnTxWk3TH9XVTB0IW2sGpNaA2hOoPYHaBtSeQm0TClSe7mfW+W+yWRZqmToLpAakAbUnUHsClKYhIKdQ2wTKJiz4ND+zEOdpfED7DHwY25dmMpsjX8vT2vfxbP6L8MGCS+y/etX56lS+566f7q2KLWzJM/KxtgHcEiEfLPiZ/MfPlGmn05FvdI61a1LefOY/nK7Jpo2prPEvzMdr/bMPbUEQ2h9uVzPpOfhMus6lY+Pj19Wc3znxBfhU+bpLkCPEuP6uUww9kQ9L8pXh27jrqy/GJ6r9uwliPEGTRU/COfNhrrM2gjbWPQ/w2fn46ccRwwx2xhki9KWc+Th5QZigkHbffQjzbD+h0uJr1kQt6D3H+EJh2Vz55huIxyDThvMIZuoWZvGf+yJSV0YIz6w+YylPPlYadsM2mMlSPcB/8P9PYS8/7D/7w/m/SNg0g9oa14DXQj42NH5INotnYfdZleSD4owf4LXJZhlIHxm3hNxpDaHCT4bN91uPD41boMPC45Zks3znPuI+Bgl91hkQwXqSaJbJ/F7C/XOK7cl7PvRchPmghPmCV9ZP+E+/RW0wowe7K5HpOTiA72H0JmqbfFbD9SYDX7id5h8jj7jFt5QsglYSH/tkPu5hFDXNkCv1BAcvzeS/EN8p/57GR8bSC/iPG8bxQUNP8t/78Buocnw0G6/LFzJ0OB8uJp/tv931z+K/7P34QvKZ7ctkQLEx1jOPw4pYP22++PaF9n7wZxH243NmPl6rfaHwDZg9nj985IMdpWx8dXDxwf2ztPoZ4Usw24z0rz20Xf/antWv2X8t6zMc138JdXQb1qX+H1Ra/eum/xdacIjns7QtWLBnlv6zMg0op45gSddnmqbNFWVuiv0vU8xPtJtHKt/viq31RfHEvlLRwtr5TpTwpXPl39EhitmJ/2yX4t+Oc2vau5muS5x75yEeBv5ydr0ReX4+fbi4vLq+voJybcl/KD8tg/7rKH2hXbq3NsbGHfXSq9uLLytFdWbYktaP6vZz0VSnj5v2vTGJEdpPa80fxH0/m9jFEATmd1JtGIaw/tHT+Gby/IvFx2vTtz9ptf+lhcKXJIjcb3pz3vRfsL0Jz79gfr5cGKgAeJkFodH57VQFg7QwX12SfxgkmY7+uw4GCcp8JL1sNFkMddtNdD6sT9e0jm1GM88k+xgm98sZxmE+bxFImq5TnFd4QefjWaCKAv9xijVx+2r+yUeQMNTrVD6sXadWzhII6fYl2vOH9XERXgtPF/JR4cJ81oJUR6gEHsNMxjqO+A/PftA7JuUTtJ3uHLjjk1YCZdq2ZOK+hY3Puus0l8/s0+iVaFwcQecKZu0hU505cYRTzul92lIKWeoulze+VYeTytCZfN/mbjiCNz+hgUW9spOidl8E8xOi8qEqraclqDv0+Bz/idNfleIbLXnI1/lZkZe7I2TMw/rZq0rnxRF0FvJfxfjeHPlKLUe+csuRr9zi81Xz/efx1ZzxUau1qhjfhdRyxkfOMkt1Jl8ceXOB2eD6UfX4ODC/dOQrlxz5yi1HvnLLka/ccuQrl4QnpP9BfKn960HRZ+sp92f2r934LCcMrYLjPze+rurj26rPTxz5yih786FYIfGqNIm7dJ8iw9/ZtZ6gFd2XD3W37ULLOS1Yen8+8qcSkJt3QG4UIBrUQqXyLkk7h0oNapPMfvqDet97812qvOgLBtISgXBQK2bRQiUHlY34S3naZtJsfDVfQtupQxtlQvuaI/tvvUApOxoTKuH+h3DCkFa82eZL8rFAG7d/hca3Zx6daMHF4gtscKkkX0DKz/eE/UdZ+KJ5DiBfLY0vkDwntE0ovBEvcaO9t0HG338E+OD+ozAfEFAxUvhqjLvfKGb8R95K+HQnJ3Bvz8kpkBZ1J5MnQVWzmaRtNFpQmWCWncbwXbj7kdz4yCQ+v2a8dH6pdLN1OZbP0afMT5h88c/Fa/EFdcXic3MEVtR/oib3V6vp3GyyKua/usXHK8s7oXu+uOybgNXis/zHy3f3E2sAZ7SHmsvnbSutQP0U5Y0XwE5+DlX2CXyF9J869lOekDsrvj2gLTOf+6VpO2DAeOTANssy10/nS9Ln4PYKstXAPssy+88Wbg7LN6xNbH7uyYLyBe8imU+/gLtjyFpxLqK3L7Dg4vsPh3OKIWPpFPz874fE9SPylgtsmI8Yih+3wOGSPh4Fih+Yf2it4dgBUSQ/dLzZWD5v/cjpEiaN/2LT2bVg5rhwdfU1PGg8nZlY41FNyZO3k1aC2fjxn6N/kfG7Gk3HM9ilS7Qk0/xZtvH74XxsIl8gvxsvbyOFDxjjixpXcCIf+1J8sf6ze10B/2ln1GxR66kYLtjauo6LP78E+cQ+JSGj1YSOVXrBheeztTs+FTSeAcD17gksCx+2us1ur8TjE2HjGXTgo0otuLh8QfH4VGquNrvwXRNaQj6vfvJKtPH0xHAzzj5lfvcF+Wj5MUV64+mWbjah4o7P7m7bJxEUlM/+0O5R1u3bEFVVu+lRG09HkPFe0VSVFxv14HCwqHx1B89aoJQkfaZMH5Zfvy3oC8guoPDhX2fDvqxZCbA4N1l/pMNZFD6LzATT5vJq+fnvbdeYEEKsCABqgJf9ITK/MZkY5//783H4XdFmumRBFpOPk97Jq+H4crMWBAvNLzAtgA0hMjHuhcXdj7fLXudGl/Lks2eUE9ePvL56dKHY78ebD9vsy7f2+WhkB20cFkxjco66woczOThoSTKbyOeMH/Ia/0nT9cSKTTkIDDISYTkLpml70vgvp/E7VtIzU+0tRBhKgUypRZif0C/zTD+C2krCstwr8HFyvvkBRmPOZygC35CWkPtweXOrF4tvnPQaP4Dvzp8AriTfpmB8vXzrJypY/cQ3+eZXMYbFal9YaZmnA0ng8SsGH9au8ny/9wNmC8FX55SrvNL7ke1KZ/1gvGKsH2FO2ViAgydvdyHtlRScCsiBL4/4JZaf5pIizux8qjiRb7/1I9v/dYa1w7S4/eLPQgsqoRgyXv7x9CpKFj21dYqDBYfXcfaKP5McfY7xg+b4XfvhtKKHV1Gy/S5Fx+/x63Cp8YM5jd+b9nPB3fwwDkZz8Fa6PT8RDFcrzvpRHWuXT3gPIrL+LtW9c85i+F53/Yh7d3s4IFlM7easmPNLNh/G89tDqyhZdCRccD6zis7eHuRBRO5kyVmdKSyfM8U+uzygFUWjhWxVznqR+RyxGpksaLZMFt8l7JZfZD5rkh7r46xVlNwpXFyHs1B8tnCzu2zDQWTIgY5g4fmwfpWR77cbzi+84HxmIzhrZ+XrlYfPestTzpdM5Js8Sv6xDXny1dL4QP86kc+fUedk2vmSSUKslNwuX47xS7WU/AXkkgf7Zk4CEt6Qc+JpT0+lT1kHSm826q7w8IacJLPxfOB8oJzjB9X3mc/JCIaj7R0/mDC+zXn9CNYbbZM5l/1P7/jl6HNQuPhrcb7OzCc8xIXbFWL+DPDxcjsrHmNcaKXhU1dCZr7J7bw09VNbdrPz3Sll8V9zfsD4gWzl3ZREwflqSua5+gGDuv1IuGsM32vXzybthPE0Pmb0aV++1/Zfc5qeTCY6tidx4byF4xN7dKPJQq5Uejjv69XP4F0E+PjYxWo0MWIH9uiXtiffi/kvhk+9jDvi0bj+9P58gqgTT+ivmHDsp/Kl9K/xPh3dYP9a1DbUeHkibHqaqk4v29TON7rveD3Q3PrXu/OB4teP9JY/NGlBOYHifdyYfaTwke51b66bamk2vdxSain6rSPSS04yG79+BM4HymX9yP0Y65BvYB8MuhjeSKyz9YObyZ+jp0SafF5V2X/9KH18+wzzE1L4+UPdD8sZ58+PYU7v3wrEzX3lPo3orxvsrkkXfP8RXgGjxFiP5RkG12J+3tsIYN8H2eh7ze8WYP/RPLBQjSbC22lkQz9bE3nl08I+6NaNVO6udg4u+vwZJ9+5jxcaLc4U+xGGeFZ+G5HXhptz54vojfDFP1ay6HysJG/uDUKI0X7bcd/aUT7Tqqos7+5NJ1o5DfQSzV+znDa83m7Xj/1dnyTK17QJ5U/XW+HvRzmAVwI+FmPVEn/OiOY/2zKvaprKgYiQEvC9WH6pUuQH8/cflYcvi/9KvD9uL75/RP18Hr5aGl/m/rUr4fxuLA5qw3xW4ETcgCixf53MV8s0PjpJGKikjp4ajeRrG4nag8dH+Y9vXUlM1+cn5LPNZ8w/wfoXx49v7bHYMb/bke/Id+Q78h35jnwl4Xvt9b9y+S9+XqRqfOXML+x0VKN8gwEzsPnqcYYSxmUWH9RCJZzujfavgTYhj3/6+lFafJ0eCGcLbTjKKx12loTXsOBWK258tOf5QOj3Tt+XqQxk2gciZ9FC5TSLFhT8mHy+Rdr6Efqjex4V2mfhz/f5TsznWS6l4+VxvkxBhHrXDl9zD76SStXPP0Jhvk5MEraSChmH+OSPVeJDxlJ0+dz3w/xbrvkHXlmQ0IP+q2lfXb7Cn2a4j6BfUxHy8Q9eyGYV+Mg3LcQnKlVqQCe7xIYeX027sh1YBe8xRJDFMJ+6au9iNcouxm7Vy2s/rai4S3qa1fIJWkx36/5ufgYrRYNckVe8+fLTT10slvEHi1LOObBeS0gwd5PPV2dnn919z6V+CMlW5mh81iEGuaWoeT1BWyt7jBeLAfhYN0VNmYVsH6xIKOz7r+5UTkswp1yX+hlERFjpIDcOAyfqOOVMsDqi5XwEkbHpByonhY8VNTvutIx4xFiMFT5QOWl8TtypYefNLY8gK8OtcGnF0UKcKJ8dlbn6+vFnd4TQm1IIIiPh17elbEcrpvNZo6WZshqOz87OLqCcAUlUPp82qhwve1NNpcXRxvCZTrQOz+V5zAUESzwQydT6fxgqeS54LeZC2sSCM5m1btO6W/fGU/mCCyHJcX0Zzgd6yvpK8jkhyXFuYb5MCznw3JdXWR9LNcvAUCgcNpQUKJWUl2zv+Kz6AfFZSWbZXdCXLQzVLsvuYzc5fpBm15fEgpPPh810LG2Ez3ar94bMti6XVCGfKf6zlvYcMDC3H6w3Jl9QF/0hgTb8QwKpQWUdXhrxX5LZRoxZp9LZn/nf+D8kTLC71TAv8QAAAABJRU5ErkJggg=="
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
                                                            <img src="https://cdn-icons-png.flaticon.com/512/906/906338.png"
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
                @endauth
                <!-- ================= Timeline ================= -->
                <div class="col-12 col-lg-6 pb-5 p-0">
                    <div class="d-flex flex-column justify-content-center w-100 mx-auto" style="max-width: 680px">
                        <!-- stories -->
                        @auth
                            <div id="carouselExampleControls1" class="carousel slide carousel-fade" data-bs-ride="carousel"
                                data-bs-interval="false">
                                <div class="carousel-inner">
                                    <!-- Carousel Item 1 -->
                                    <div class="carousel-item active">
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
                                    <div class="carousel-item">
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
                        @endauth

                        <!-- create post -->
                        @auth
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
                        @endauth
                        <!-- create room -->
                        @auth
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
                                    <div id="carouselExampleControls" class="carousel slide carousel-fade"
                                        data-bs-ride="carousel" data-bs-interval="false">
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
                                                <img src="https://source.unsplash.com/random/10" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/12" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/13" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/14" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/15" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/16" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/17" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/18" alt="avatar"
                                                    class="rounded-circle me-2"
                                                    style="width: 38px; height: 38px; object-fit: cover" />
                                                <img src="https://source.unsplash.com/random/19" alt="avatar"
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
                        @endauth
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
                                            <div class="content">
                                                <h6 class="mt-4" id="postContent{{ $post->id }}">
                                                    @if (strlen($post->content) > 2000)
                                                        <span id="subs{{ $post->id }}">{{ substr($post->content, 0, 200) }}</span>
                                                        <span id="dots{{ $post->id }}">...</span>
                                                        <span id="more{{ $post->id }}" style="display:none;">
                                                            {{ substr($post->content, 0, 200) }}{{ substr($post->content, 200) }}</span>
                                                        <a id="see-more-button{{ $post->id }}" href="javascript:void(0);" onclick="toggleSeeMore({{ $post->id }})">See more</a>
                                                    @else
                                                        {{ $post->content }}
                                                    @endif
                                                </h6>
                                            </div>
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

                                                    <button class="btn"><i class="far fa-share"></i>
                                                        Share</button>
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
                @auth
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
                                        <i class="fas fa-search pointer" type="button" data-bs-toggle="modal"
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
            <div class="fixed-bottom right-100 p-3 mb-5" style="z-index: 6; left: initial" type="button"
                data-bs-toggle="modal" data-bs-target="#newChat">
                <i class="fas fa-edit bg-white rounded-circle p-3 shadow"></i>
            </div>
        @endauth


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

<script>
    function toggleSeeMore(postId) {
        var dots = document.getElementById("dots" + postId);
        var subs = document.getElementById("subs" + postId);
        var moreText = document.getElementById("more" + postId);
        var btnText = document.getElementById("see-more-button" + postId);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            subs.style.display = "inline";
            moreText.style.display = "none";
            btnText.innerHTML = "See more";
        } else {
            dots.style.display = "none";
            subs.style.display = "none";
            moreText.style.display = "inline";
            moreText.style.display = "inline";
            // btnText.innerHTML = "See less";
            btnText.innerHTML = "";
        }
    }
</script>
