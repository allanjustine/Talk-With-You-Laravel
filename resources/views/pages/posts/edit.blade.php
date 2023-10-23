<div class="modal fade" id="editPost{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-left: 37%;"><b>Edit post</b></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('post.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> --}}
                    <p><img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="Profile Image"
                            class="img-fluid rounded-circle mt-2"
                            style="width: 50px; height: 50px; border: 3px solid black;"> {{ auth()->user()->name }}</p>
                    <textarea name="content" id="text-area" cols="30" rows="5" class="form-control mb-3"
                        placeholder="You're updating your post, {{ auth()->user()->name }}?" autocomplete="content" autofocus required>{{ $post->content }}</textarea>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <select name="category_id" id="category_id" class="form-select">
                        <option value="" selected hidden>Feeling/activity</option>
                        <option disabled>Feeling/activity</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                        <option value="">Remove</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary form-control" id="submit-button"><b>Update</b></button>
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
