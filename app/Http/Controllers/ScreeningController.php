<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        return Screening::all();
    }

    public function destroy(string $id)
    {
        Screening::destroy($id);
        return response()->json(null, 204);
    }
}
