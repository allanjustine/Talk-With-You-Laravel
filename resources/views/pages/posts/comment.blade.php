<div class="modal fade" id="commentPost{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title ms-auto"><b>{{ $post->user->name }}&apos;s Post</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @csrf
            <div class="modal-body" @if (count($post->post_image) != 0) style="height: 600px;" @endif>
                <h5>{{ $post->content }}</h5>
                <div>
                    <div id="click" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($post->post_image as $index => $imagePath)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                    <img src="{{ Storage::url($imagePath) }}" class="d-block w-100" alt="Post Image"
                                        style="height: 550px;">
                                </div>
                            @endforeach
                        </div>
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#click"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#click"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button> --}}
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between px-3 mt-3">
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
            <div class="px-4 py-2">
                <div class="d-flex justify-content-between align-items-center border-top border-bottom">
                    @if (auth()->check() && $post->likes->contains('user_id', auth()->id()))
                        <form action="{{ route('post.unlike', $post->likes->where('user_id', auth()->id())->first()) }}"
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
                        <div class="btn"><i class="far fa-comment"></i> Comment</div>
                    </div>
                    <div>

                        <div class="btn"><i class="far fa-share"></i> Share</div>
                    </div>
                </div>
            </div>
            <div class="px-4 mt-3">
                @foreach ($post->comments as $comment)
                    <div class="mb-2">
                        <div style="position: absolute;" class="mt-1">
                            @if (auth()->check() && auth()->user()->id == $comment->user->id)
                                <a class="text-black" href="/profile">

                                    <img src="{{ Storage::url($comment->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle mt-2"
                                        style="width: 45px; height: 45px; border: 3px solid black;"></a>
                            @else
                                <a class="text-black" href="/user/{{ $comment->user->id }}/posts">

                                    <img src="{{ Storage::url($comment->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle mt-2"
                                        style="width: 45px; height: 45px; border: 3px solid black;"></a>
                            @endif
                        </div>

                        <div class="ml-5">
                            <footer class="px-4 py-2 border mb-2 mt-3 footer-comment">
                                @if (auth()->check() && auth()->user()->id == $comment->user->id)
                                    <a class="text-black" href="/profile">
                                        {{ $comment->user->name }}</a>
                                @else
                                    <a class="text-black" href="/user/{{ $comment->user->id }}/posts">
                                        {{ $comment->user->name }}</a>
                                @endif <br>
                                <span class="text-wrap">
                                    {{ $comment->user_comment }}
                                </span>

                            </footer>
                            <div class="d-flex gap-3" style="margin-top: -8px; margin-left: 20px;">
                                <a>Like</a>
                                <a>Reply</a>
                                <h6>
                                    {{ $comment->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="p-3">
                <form action="{{ route('post.comment', $post->id) }}" method="POST">
                    @csrf
                    <input type="text" hidden name="post_id" value="{{ $post->id }}">

                    @error('user_comment')
                        <span class="text-danger">
                            <strong>The comment field must not be greater than 255 characters.</strong>
                        </span>
                    @enderror
                    <div>
                        @auth
                            <div style="position: absolute;">
                                <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="Profile Image"
                                    class="img-fluid rounded-circle mt-2"
                                    style="width: 30px; height: 30px; border: 3px solid black;">
                            </div>
                        @else
                            <div style="position: absolute;">
                                <img src="https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                    alt="Guest Image" class="img-fluid rounded-circle mt-2"
                                    style="width: 30px; height: 30px; border: 3px solid black;">
                            </div>
                        @endauth
                        <div class="card text-card p-2 ml-5">
                            <textarea name="user_comment" id="comment-text-area" cols="30" rows="4" class="mb-3"
                                placeholder="Write a comment..." autocomplete="user_comment" autofocus required></textarea>
                        </div>

                        <div class="button-comment ml-5">
                            <div class="form-control mt-2">
                                <button class="btn float-end" id="comment-button" title="Comment">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    textarea {
        resize: none;
        border: none !important;
        width: 100%;
        border-bottom-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    textarea:focus {
        outline: none !important;
    }

    .text-card {
        border-bottom: none !important;
        box-shadow: none !important;
    }

    #comment-button:disabled {
        cursor: not-allowed;
        border: none;
        pointer-events: all !important;
    }

    .button-comment {
        margin-top: -20px;
        border-top: none !important;
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
    }

    .text-wrap {
        word-wrap: break-word;
    }

    .footer-comment {
        background-color: rgba(22, 21, 21, 0.055);
        border-radius: 50px;
    }
</style>

<script>
    document.getElementById('comment-button').disabled = true;

    document.getElementById('comment-text-area').addEventListener('keyup', e => {
        if (e.target.value == "") {
            document.getElementById('comment-button').disabled = true;
        } else {
            document.getElementById('comment-button').disabled = false;
        }
    });
</script>
