@extends('layout.base')

@section('title')
    @if ($userPosts->count() === 0)
        @foreach ($users as $user)
            {{ $user->name }} no post found
        @endforeach
    @else
        {{ $userPosts->first()->user->name }}&apos;s posts
    @endif
@endsection


@section('content')
    <div>
        <div class="container">
            <h5 class="mt-4">
                @if ($userPosts->count() === 0)
                    <p class="text-muted text-center">
                        @foreach ($users as $user)
                            <h5 class="mt-4"><img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image"
                                    class="img-fluid rounded-circle"
                                    style="width: 70px; height: 70px; border: 3px solid black;">
                                {{ $user->name }}</h5>
                        @endforeach
                    </p>
                @else
                    <img src="{{ Storage::url($userPosts->first()->user->profile_image) }}" alt="Profile Image"
                        class="img-fluid rounded-circle mt-2"
                        style="width: 50px; height: 50px; border: 3px solid black;"></a>
                    {{ $userPosts->first()->user->name }}&apos;s posts
                @endif
            </h5>
        </div>
        <hr>
        @foreach ($userPosts as $post)
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
                                        data-bs-target="#deletePost{{ $post->id }}"><i class="far fa-trash"></i>
                                        Delete</a>
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
                                    {{-- Large Image on the Left (for larger screens) --}}
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
        @if ($userPosts->count() === 0)
            <p class="text-muted text-center">
                <i class="far fa-circle-xmark"></i> No posts found from this user
            </p>
        @endif
    </div>
@endsection

{{-- <style>
    #menu-button {
        display: none;
    }

    .card:hover #menu-button {
        display: block;
    }
</style> --}}

<style>
    .footer-comment {
        background-color: rgba(22, 21, 21, 0.055);
        border-radius: 50px;
    }
</style>
