<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    

    public function index()
    {
    // Retourne tous les utilisateurs
        return User::all();
    }

    public function show(string $id)
    
    {
        // Retourne l'utilisateur correspondant à l'ID ou génère une erreur 404 si non trouvé
        return User::findOrFail($id);
    }

     // Supprime l'utilisateur correspondant à l'ID
    public function destroy(string $id)
    {
        User::destroy($id);
     // Retourne une réponse JSON vide avec un code HTTP 204 (No Content)   
        return response()->json(null,204);
    }
}
