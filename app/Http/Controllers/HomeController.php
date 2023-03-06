<?php

namespace App\Http\Controllers;

use App\Models\Pin;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // Récupère tous les pins
        $pins = Pin::all();

        // Retourne la vue pour la page d'accueil et transmet les pins
        return view('welcome', ['pins' => $pins]);
    }

    public function show($id)
    {
        $pin = Pin::findOrFail($id);
        return view('pins', compact('pin'));
    }
}