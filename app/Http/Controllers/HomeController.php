<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;

class HomeController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::latest()->get();

        return view('home', compact('testimoni'));
    }
}