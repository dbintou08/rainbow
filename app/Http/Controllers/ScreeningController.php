<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        return Seance::all();
    }

    public function store(Request $request)
    {
        $seance = Seance::create($request->all());
        return response()->json($seance, 201);
    }

    public function show(string $id)
    {
        return Seance::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $seance = Seance::findOrFail($id);
        $seance->update($request->all());
        return response()->json($seance, 200);
    }

    public function destroy(string $id)
    {
        Seance::destroy($id);
        return response()->json(null, 204);
    }
}