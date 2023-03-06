<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class MyProfilController extends Controller
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
            'description' => 'required|string|max:255',
        ]);
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->description = $validatedData['description'];
        $user->save();
    
        session()->flash('success', 'Vos changements ont été enregistrés avec succès!');
        return redirect()->route('profile')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}