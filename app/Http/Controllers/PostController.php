<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class PostController extends Controller
{
    public function single(Posts $post, Request $r)
    {
        if (RateLimiter::remaining($r->ip(), $perMinute = 1)) {
            RateLimiter::hit($r->ip());
            // dd($r->ip());
            $post->update(['views' => $post->views + 1]);
        }

        return view('post.single', compact('post'));
    }

    public function index()
    {
        $posts = Posts::with(['user', 'media'])->where('status', 1)->paginate(12);
        return view('post.show', compact('posts'));
    }
}
