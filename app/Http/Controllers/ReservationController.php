<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Screening;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'user_id' => 'required|exists:users,id',
      'screening_id' => 'required|exists:screenings,id',
      'number_of_tickets' => 'required|integer|min:1',
      'total_amount' => 'required|numeric|min:0',
    ]);

    // Creer une reservation
    $reservation = Reservation::create([
      'user_id' => $validatedData['user_id'],
      'screening_id' => $validatedData['screening_id'],
      'number_of_tickets' => $validatedData['number_of_tickets'],
      'status' => 'confirmed',
      'total_amount' => $validatedData['total_amount'],
    ]);
    // Creer le paiement de la reservation
    $payment = Payment::create([
      'reservation_id' => $reservation->id,
      'amount' => $reservation->total_amount,
      'status' => 'complete',
    ]);

    // ! Mettre a jour le nombre de place disponible pour cette seance
    $screening = Screening::findOrFail($validatedData['screening_id']);
    $screening->update([
      'available_seats' => $screening->available_seats - $validatedData['number_of_tickets']
    ]);

    return response()->json([
      'reservation' => $reservation,
      'payment' => $payment,
    ], 201);
  }

    public function destroy(string $id)
    {
        Reservation::destroy($id);
        return response()->json(null, 204);
    }
}
