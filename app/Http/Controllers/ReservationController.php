<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

    public function destroy(string $id)
    {
        Reservation::destroy($id);
        return response()->json(null, 204);
    }
}
