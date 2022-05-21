<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use App\Models\Portofilo;
use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Artesaos\SEOTools\Facades\{SEOMeta, OpenGraph, JsonLd};

class BallinaController extends Controller
{
    public function index()
    {
        SEOMeta::addMeta('website:author', 'Alpet Gexha');
        SEOMeta::setCanonical(asset('svg/logo.svg'));

        OpenGraph::setTitle('Ballina');
        OpenGraph::addProperty('website:author', 'Alpet Gexha');

        $about = Aboutme::select('name', 'profile', 'email', 'phone', 'body', 'year')->first();

        $name = $about->name;
        $body = $about->body;
        $email = $about->email;
        $phone = $about->phone;
        $profile = $about->profile;
        $age = Carbon::parse($about->year)->diff(Carbon::now())->y;


        // if ($about == null) {
        //     Aboutme::create(
        //         config('social.aboutme')
        //     );
        //     return redirect()->url('/');
        // }
        // $skills = Aboutme::select('skills')->first() ?  Aboutme::select('skills')->first()->toJson() : []; // x
        // // $skills = Response::json($skillss);;
        // $skills ? json_decode($skills) : [];  // x
        // // map services
        // $services = Aboutme::select('services')->first() ? Aboutme::select('services')->first()->toJson() : []; //
        // $services ? json_decode($services) : [];  // x

        // $facts = Aboutme::select('facts')->first() ? Aboutme::select('facts')->first()->toJson() : []; // x
        // $facts ? json_decode($facts) : [];  // x
        // $about = Aboutme::select('name', 'profile', 'email', 'phone', 'body')->first()->get(); // x
        $skills = Aboutme::select('skills')->first()->pluck('skills')->toJson(); // x
        // $skills = Response::json($skillss);;
        $skills = json_decode($skills);  // x
        // map services
        $services = Aboutme::select('services')->first()->pluck('services')->toJson(); //
        $services = json_decode($services);  // x

        $facts = Aboutme::select('facts')->first()->pluck('facts')->toJson(); // x
        $facts = json_decode($facts);

        $portofilos = Portofilo::with('media')->orderBy('views', 'desc')->get();

        $posts = Posts::with(['user', 'media'])->where('status', 1)->orderBy('views', 'desc')->limit(6)->get();
        return view('dashboard', compact(
            'about','skills','services','facts','portofilos','posts','email','phone','profile','name','body','age'
        ));
    }
}
