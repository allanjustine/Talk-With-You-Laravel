<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request, User $user, Post $post)
    {
        $user = auth()->user();

        $categories = Category::all();

        $search = $request->search;

        $userCount = User::count();

        $posts = Post::where(function ($query) use ($search) {
            $query->where('content', 'like', "%$search%");
        })
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
            })
            ->with('comments')->get();


        return view('pages.posts.searched', compact('posts', 'search', 'user', 'post', 'userCount', 'categories'));
    }

    public function index(User $user, Post $post, Like $like, Request $request)
    {
        $user = auth()->user();

        $search = $request->search;

        $categories = Category::all();

        $userCount = User::count();

        $posts = Post::orderBy('created_at', 'desc')->with('category')->get();

        return view('pages.posts.index', compact('categories', 'posts', 'user', 'post', 'like', 'search', 'userCount'));
    }


    public function myPosts(Post $post, User $user, Request $request)
    {
        $user = auth()->user();

        $search = $request->search;

        $categories = Category::all();

        $userCount = User::count();

        $my_posts = Post::orderBy('created_at', 'desc')->where('user_id', auth()->id())->with('category')->get();

        return view('pages.users.posts', compact('categories', 'my_posts', 'post', 'user', 'search', 'userCount'));
    }

    public function userPosts(Request $request, $userId)
    {
        $user = auth()->user();

        $search = $request->search;

        $categories = Category::all();

        $userCount = User::count();

        $userPosts = Post::orderBy('created_at', 'desc')->where('user_id', $userId)->with('category')->get();

        $users = User::where('id', $userId)->get();

        return view('pages.posts.user-posts', compact('userPosts', 'user', 'users', 'userCount', 'search', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'           =>          ['required'],
            'post_image'        =>          ['max:2048']
        ]);

        $users = auth()->check();

        // Post::create(
        //     $request->all()
        // );

        $imagePaths = [];

        if ($request->hasFile('post_image')) {
            foreach ($request->file('post_image') as $postImg) {
                $imageFileName = Str::random(20) . '.' . $postImg->getClientOriginalExtension();
                $postImg->storeAs('images/post_pictures', $imageFileName, 'public');
                $imagePaths[] = 'images/post_pictures/' . $imageFileName;
            }
        }

        Post::create([
            'post_image'        =>          $imagePaths,
            'content'           =>          $request->content,
            'category_id'       =>          $request->category_id,
            'user_id'           =>          auth()->id()
        ]);

        return back()->with('message', 'Posted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'content'       =>          ['required']
        ]);

        if ($post->user_id != auth()->id()) {
            return back()->with('error', 'You can`t update someone`s post. Please try again!');
        } else {
            $post->update([
                'content'           =>          $request->content,
                'category_id'       =>          $request->category_id
            ]);
        }

        return back()->with('message', 'Post updated successfully');
    }

    public function profilePostUpdate(Request $request, Post $post)
    {
        $request->validate([
            'content'       =>          ['required']
        ]);

        if ($post->user_id != auth()->id()) {
            return back()->with('error', 'You can`t update someone`s post. Please try again!');
        } else {
            $post->update([
                'content'           =>          $request->content,
                'category_id'       =>          $request->category_id
            ]);
        }

        return back()->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            return back()->with('error', 'You can`t delete someone`s post. Please try again!');
        } else {
            $post->delete();
        }

        return back()->with('message', 'Post deleted successfully');
    }
}
