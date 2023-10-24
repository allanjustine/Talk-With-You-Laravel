<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{
    public function like(Request $request)
    {

        $post = Post::find($request->post_id);

        if ($post === null) {
            return back()->with('error', 'The post associated with this like no longer exists.');
        }

        $user = User::find($post->user_id);

        Like::create([
            'post_id'       =>      $request->post_id,
            'user_id'       =>      auth()->id(),
        ]);

        Notification::send($user, new LikeNotification($post));

        return back();
    }

    public function unlike(Like $like)
    {

        if (auth()->id() == $like->user_id) {
            $like->delete();

            return back();
        } else {
            return back()->with('error', 'You are not authorized to unlike this post.');
        }
    }
}
