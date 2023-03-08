<?php

namespace App\Http\Controllers;

use App\Models\Pin;

class HomeController extends Controller
{
    public function index()
    {
        $pins = Pin::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('pins'));
    }
    

    public function show($id)
    {
        $pin = Pin::findOrFail($id);
        return view('pins', compact('pin'));
    }
}