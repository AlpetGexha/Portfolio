<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BallinaController extends Controller
{
    public function index()
    {
        $about = Aboutme::select('name', 'profile', 'email', 'phone', 'body')->first()->get();
        $skills = Aboutme::select('skills')->first()->pluck('skills')->toJson();
        // $skills = Response::json($skillss);;
        $skills = json_decode($skills);
        return view('dashboard', compact('about', 'skills'));
    }
}
