<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Recuperer tous les films avec leur categorie
    public function index()
    {
    return response()->json(
      Movie::with('category')->get(),
      200
    );
    }

    public function show(string $id)
    {
      $movie = Movie::with([
        'category',               // Récupère la catégorie du film
        'screenings.room'         // Récupère les séances avec leur salle
      ])->findOrFail($id);

      return response()->json($movie, 200);
    }

    public function destroy(string $id)
    {
        Movie::destroy($id);
        return response()->json(null, 204);
    }
}
