@extends('layout.base')

@section('title')
    @if (!$search)
        Search
    @else
        {{ $search }}
    @endif
@endsection


@section('content')
    <div>
        {{-- <div class="d-flex justify-content-center">
            <div class="card col-md-6 col-sm-6 p-3 mt-3">
                <div class="form-group mt-3">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control" value="{{ $search }}"
                                style="border-radius: 20px 0px 0px 20px;" name="search" placeholder="Search TWY post"
                                autocomplete="search" autofocus>
                            <button class="btn border"><i class="far fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
        @foreach ($posts as $post)
            @auth
                @include('pages.posts.comment')
            @endauth
            <div class="d-flex justify-content-center mt-3">
                <div class="card col-md-6 col-sm-6 border-0">
                    <div class="body px-2 py-3">
                        <div class="dropdown">
                            <a class="btn float-right" href="#" id="menu-button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"
                                data-bs-postid="{{ $post->id }}"><i class="far fa-ellipsis-vertical"></i></a>
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
                            @if (auth()->check() && auth()->user()->id == $post->user->id)
                                <a class="text-black" href="/profile"><img
                                        src="{{ Storage::url($post->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle"
                                        style="width: 50px; height: 50px; border: 3px solid black;">
                                    {{ $post->user->name }}</a>
                            @else
                                <a class="text-black" href="/user/{{ $post->user->id }}/posts"><img
                                        src="{{ Storage::url($post->user->profile_image) }}" alt="Profile Image"
                                        class="img-fluid rounded-circle"
                                        style="width: 50px; height: 50px; border: 3px solid black;">
                                    {{ $post->user->name }}</a>
                            @endif
                            @if (optional($post->category)->name)
                                <span class="text-muted">- <i
                                        class="
                                    {{ $post->category->id === 1 ? 'far fa-face-smile' : '' }}
                                    {{ $post->category->id === 2 ? 'far fa-face-frown-slight' : '' }}
                                    {{ $post->category->id === 3 ? 'far fa-heart-crack' : '' }}
                                    {{ $post->category->id === 4 ? 'far fa-face-worried' : '' }}
                                    {{ $post->category->id === 5 ? 'far fa-face-smile-halo' : '' }}
                                    {{ $post->category->id === 6 ? 'far fa-face-smile-hearts' : '' }}
                                    "></i>
                                    {{ optional($post->category)->name }}</span>
                            @endif
                        </h6>
                        <span class="text-muted">{{ $post->created_at->diffForHumans() }}</span>
                        <h5 class="mt-4">{{ $post->content }}</h5>
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
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#commentPost{{ $post->id }}"><i
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
                <i class="far fa-magnifying-glass"></i> No result for "{{ $search }}"
            </p>
        @endif
    </div>
@endsection

<style>
    .footer-comment {
        background-color: rgba(22, 21, 21, 0.055);
        border-radius: 50px;
    }
</style>
