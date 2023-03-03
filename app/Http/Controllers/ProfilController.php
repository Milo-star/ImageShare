<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function showProfileForm()
    {
        return view('profil.edit', ['user' => auth()->user()]);
    }
    
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        
        $user->update($validatedData);

        session()->flash('success', 'Vos changements ont été enregistrés avec succès!');
        return redirect()->route('profile')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
    
}