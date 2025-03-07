<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Payment;
use Illuminate\Support\Facades\Request;

class PaymentController extends Controller
{
  public function update(Request $request, Payment $payment)
  {
    $validatedData = $request->validate([
      'status' => 'required|in:completed,failed',
    ]);

    $payment->update([
      'status' => $validatedData['status'],
    ]);

    return response()->json($payment, 200);
  }
}
