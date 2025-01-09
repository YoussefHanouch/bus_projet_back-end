<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Rechercher l'utilisateur correspondant dans la base de données
        $user = User::where('email', $email)->first();
    
        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && Hash::check($password, $user->password)) {
            // Authentification réussie, renvoyer une réponse réussie
            return response()->json(['message' => 'Login successful'], 200);
        }
    
        // Si l'authentification échoue, renvoyer une réponse d'erreur
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
}
