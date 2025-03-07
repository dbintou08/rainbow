<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
         // Crée un nouvel utilisateur avec les données validées
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Génère un token JWT pour l'utilisateur nouvellement créé
        $token = JWTAuth::fromUser($user);

            // Retourne une réponse JSON avec l'utilisateur et le token, avec un code HTTP 201 (Created)
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        
        // Récupère les identifiants de la requête (email et mot de passe)
        $credentials = $request->only('email', 'password');

        // Tente de générer un token JWT avec les identifiants fournis
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
         // Retourne une réponse JSON avec le token JWT
        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout()
    {
         // Déconnecte l'utilisateur
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function user()
    {
         // Retourne une réponse JSON avec les informations de l'utilisateur authentifié
        return response()->json(Auth::user());
    }
    public function refresh()
{
    // Rafraîchit le token JWT et retourne une réponse JSON avec le nouveau token
    return response()->json([
        'token' => Auth::refresh(),
    ]);
}
}