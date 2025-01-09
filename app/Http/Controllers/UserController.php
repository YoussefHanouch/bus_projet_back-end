<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash; // Import de la classe Hash

class UserController extends Controller
{
    // Méthode pour récupérer tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return response()->json(['success' => true, 'data' => $users], 200);
    }

    // Méthode pour créer un nouvel utilisateur
 public function store(Request $request)
{
    // Validation des données
  // Validation des données
$validator = Validator::make($request->all(), [
    'name' => 'required|string',
    'prenom' => 'required|string',
    'email' => 'required|unique:users,email',
    'password' => 'required|min:6',
    'type' => 'required|in:user,admin', // Assurez-vous que le type est soit 'user' soit 'admin'
]);


    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->name,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'type' => $request->type,
        'password' => Hash::make($request->password), // Utilisation de la fonction Hash pour hacher le mot de passe
    ]);

    return response()->json(['success' => true, 'data' => $user], 201);
}

       

    // Méthode pour récupérer un utilisateur par son ID
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }
        return response()->json(['success' => true, 'data' => $user], 200);
    }

    // Méthode pour mettre à jour les informations d'un utilisateur
    public function update(Request $request, $id)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

        // Mise à jour des informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json(['success' => true, 'data' => $user], 200);
    }

    // Méthode pour supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }
        $user->delete();
        return response()->json(['success' => true, 'message' => 'Utilisateur supprimé avec succès'], 200);
    }
}
