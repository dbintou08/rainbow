<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        return Salle::all();
    }

    public function store(Request $request)
    {
        $salle = Salle::create($request->all());
        return response()->json($salle, 201);
    }

    public function show(string $id)
    {
        return Salle::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $salle = Salle::findOrFail($id);
        $salle->update($request->all());
        return response()->json($salle, 200);
    }

    public function destroy(string $id)
    {
        Salle::destroy($id);
        return response()->json(null, 204);
    }
}