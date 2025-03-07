<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function show(string $id)
    {
        return User::findOrFail($id);
    }

  /**
   * Récupère les réservations de l'utilisateur authentifié.
   *
   * @return \Illuminate\Http\JsonResponse
   */
    public function getUserReservations()
    {
      // Récupérer l'utilisateur authentifié
      $user = Auth::user();

      // Charger les réservations avec les relations screening et payment
      $reservations = $user->reservations()->with(['screening.movie', 'payment', 'screening.room'])->get();

      // Retourner les réservations
      return response()->json([
        'reservations' => $reservations,
      ], 200);
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(null,204);
    }
}
