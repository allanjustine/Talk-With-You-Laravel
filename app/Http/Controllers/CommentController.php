<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $post = Post::find($request->post_id);

        if ($post === null) {
            return back()->with('error', 'The post associated with this comment no longer exists.');
        }

        $user = User::find($post->user_id);

        $request->validate([
            'user_comment'      =>          ['required', 'max:255']
        ]);

        $comment = Comment::create([
            'user_comment'      =>          $request->user_comment,
            'post_id'           =>          $request->post_id,
            'user_id'           =>          auth()->id(),
        ]);

        Notification::send($user, new CommentNotification($post));

        if ($comment->post->user->id === auth()->user()->id) {

            return back()->with('message', 'You commented on your own post.');
        } else {

            return back()->with('message', 'You commented on the post of ' . $comment->post->user->name);
        }
    }
}
