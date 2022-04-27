<?php

namespace App\Http\Controllers;

use App\Models\Aboutme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BallinaController extends Controller
{
    public function index()
    {

        $about = Aboutme::select('name', 'profile', 'email', 'phone', 'body')->first()->get(); // x
        $skills = Aboutme::select('skills')->first()->pluck('skills')->toJson(); // x
        // $skills = Response::json($skillss);;
        $skills = json_decode($skills);  // x
        // map services
        $services = Aboutme::select('services')->first()->pluck('services')->toJson(); //
        $services = json_decode($services);  // x

        $facts = Aboutme::select('facts')->first()->pluck('facts')->toJson(); // x
        $facts = json_decode($facts);
        return view('dashboard', compact('about', 'skills', 'services','facts'));
    }
}
