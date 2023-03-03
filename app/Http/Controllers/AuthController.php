<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    // Register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the user's registration details
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
    
        // If the validation fails, redirect the user back to the registration page with an error message
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Create a new user with the provided details
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Log the user in and redirect them to their dashboard
        Auth::login($user);
        return redirect('/profile');
    }
    
    // Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion de l'utilisateur
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Connexion réussie, redirection vers la page d'accueil ou une autre page de votre choix
            return redirect()->route('profile');
        }

        // Échec de la connexion, redirection vers la page de connexion avec un message d'erreur
        return redirect('/login')->with('error', 'Adresse e-mail ou mot de passe incorrect.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
