<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function single(Posts $post)
    {
        return view('post.single', compact('post'));
    }

    public function index()
    {
       $posts = Posts::paginate(12);
        return view('post.show', compact('posts'));
    }
}
