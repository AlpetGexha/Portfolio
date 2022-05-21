<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Artesaos\SEOTools\Facades\{SEOMeta, OpenGraph, JsonLd};
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function single(Posts $post, Request $r)
    {
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription(Str::removehtml($post->body));
        SEOMeta::addKeyword([$post->title]);
        SEOMeta::addMeta('article:created_at', $post->created_at->toW3CString(), 'property');

        OpenGraph::setTitle($post->title)
            ->setDescription(Str::removehtml($post->body))
            ->setType('article')
            ->setArticle([
                'published_time' => $post->created_at->toW3CString(),
                'modified_time' => $post->updated_at->toW3CString(),
                'author' => $post->user->username,
                // 'section' => ,
                'locale' => ['en_US', 'sq_AL'],
            ]);
            OpenGraph::addImage($post->getMedia('posts')->first()->getUrl('thumb'));

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
