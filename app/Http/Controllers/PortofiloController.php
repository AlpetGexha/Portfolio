<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\Portofilo;
use Artesaos\SEOTools\Facades\{SEOMeta, OpenGraph, JsonLd};
use Illuminate\Support\Str;

class PortofiloController extends Controller
{

    public function single(Portofilo $portofilo, Request $r)
    {

        SEOMeta::setTitle($portofilo->title);
        SEOMeta::setDescription(Str::removehtml($portofilo->body));
        SEOMeta::addKeyword([$portofilo->title]);
        SEOMeta::addMeta('article:created_at', $portofilo->created_at->toW3CString(), 'property');

        OpenGraph::setTitle($portofilo->title)
            ->setDescription(Str::removehtml($portofilo->body))
            ->setType('article')
            ->setArticle([
                'published_time' => $portofilo->created_at->toW3CString(),
                'modified_time' => $portofilo->updated_at->toW3CString(),
                'author' => $portofilo->user->username,
                // 'section' => ,
                'locale' => ['en_US', 'sq_AL'],
            ]);

        OpenGraph::addImage($portofilo->getMedia('portofilo')->first()->getUrl('thumb'));

        if (RateLimiter::remaining($r->ip(), $perMinute = 1)) {
            RateLimiter::hit($r->ip());
            // dd($r->ip());
            $portofilo->update(['views' => $portofilo->views + 1]);
        }
        return view('portofilo.single', compact('portofilo'));
    }
}
