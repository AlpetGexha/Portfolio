<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function redirect($code)
    {
        $link = ShortUrl::where('code', $code)->first();

        if ($link)
            return redirect($link->url);
        else
            return to_route('index')->with('status', 'Url dont exist');
    }
}
