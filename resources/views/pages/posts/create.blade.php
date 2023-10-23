<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 37%;"><b>Create post</b></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> --}}
                    <div class="my-1 p-1">
                        <div class="d-flex flex-column">
                            <!-- name -->
                            <div class="d-flex align-items-center">
                                <div class="p-2">
                                    <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="from fb"
                                        class="rounded-circle"
                                        style="
                                  width: 38px;
                                  height: 38px;
                                  object-fit: cover;
                                " />
                                </div>
                                <div>
                                    <p class="m-0 fw-bold">{{ auth()->user()->name }}</p>
                                    <select class="form-select border-0 bg-gray w-75 fs-7"
                                        aria-label="Default select example">
                                        <option selected value="1">Public</option>
                                        <option value="2">Friend</option>
                                        <option value="3">Only me</option>
                                        <option value="4">Custom</option>
                                    </select>
                                </div>
                            </div>
                            <!-- text -->
                            <div>
                                <textarea name="content" id="text-area" cols="30" rows="5"
                                    class="form-control mb-3 mt-2 @error('content') is-invalid @enderror"
                                    placeholder="What's on your mind, {{ auth()->user()->name }}?" autocomplete="content" autofocus required></textarea>
                            </div>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- emoji  -->
                            <div class="d-flex justify-content-between align-items-center">
                                <img src="https://www.facebook.com/images/composer/SATP_Aa_square-2x.png"
                                    class="pointer" alt="fb text"
                                    style="
                                width: 30px;
                                height: 30px;
                                object-fit: cover;
                              " />
                                <i class="far fa-laugh-wink fs-5 text-muted pointer"></i>
                            </div>

                            <!-- options -->
                            <div class="form-group mb-0">
                                <input id="post_image" type="file"
                                    class="form-control mt-2 pr-4 @error('post_image') is-invalid @enderror"
                                    name="post_image[]" value="{{ old('post_image') }}" accept="image/*"
                                    autocomplete="post_image" multiple>
                                <span class="float-right disabled"
                                    @error('post_image')
                                        hidden
                                    @enderror
                                    style="margin-top: -30px; margin-right: 10px; color: gray;"><i
                                        class="far fa-image"></i></span>
                                @error('post_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <select name="category_id" id="category_id" class="form-select mt-1">
                                <option value="" selected hidden>Feeling/activity</option>
                                <option disabled>Feeling/activity</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                <option value="">Remove</option>
                            </select>
                            <div class="d-flex justify-content-between border border-1 border-light rounded p-3 mt-3">
                                <p class="m-0">Add to your post</p>
                                <div>
                                    <i class="fas fa-images fs-5 text-success pointer mx-1"></i>
                                    <i class="fas fa-user-check fs-5 text-primary pointer mx-1"></i>
                                    <i class="far fa-smile fs-5 text-warning pointer mx-1"></i>
                                    <i class="fas fa-map-marker-alt fs-5 text-info pointer mx-1"></i>
                                    <i class="fas fa-microphone fs-5 text-danger pointer mx-1"></i>
                                    <i class="fas fa-ellipsis-h fs-5 text-muted pointer mx-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <p><img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="Profile Image"
                            class="img-fluid rounded-circle mt-2"
                            style="width: 50px; height: 50px; border: 3px solid black;"> {{ auth()->user()->name }}</p>
                    <textarea name="content" id="text-area" cols="30" rows="5" class="form-control mb-3"
                        placeholder="What's on your mind, {{ auth()->user()->name }}?" autocomplete="content" autofocus required></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="post_image" type="file"
                        class="form-control pr-4 mb-1 @error('post_image') is-invalid @enderror" name="post_image[]"
                        value="{{ old('post_image') }}" accept="image/*" autocomplete="post_image" multiple>
                    <span class="float-right disabled"
                        @error('profile_image')
                            hidden
                        @enderror
                        style="margin-top: -30px; margin-right: 10px; color: gray;"><i class="far fa-image"></i></span>
                    @error('post_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="" selected hidden>Feeling/activity</option>
                        <option disabled>Feeling/activity</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select> --}}

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary form-control" id="submit-button"><b>Post</b></button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    textarea {
        resize: none;
    }

    #submit-button:disabled {
        cursor: not-allowed;
        pointer-events: all !important;
    }
</style>


<script>
    document.getElementById('submit-button').disabled = true;

    document.getElementById('text-area').addEventListener('keyup', e => {
        if (e.target.value == "") {
            document.getElementById('submit-button').disabled = true;
        } else {
            document.getElementById('submit-button').disabled = false;
        }
    });
</script>
