<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfilController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $pins = $user->pins()->orderByDesc('created_at')->get();
        return view('user', ['user' => $user, 'pins' => $pins]);
    }
    

}