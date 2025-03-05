<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie, 201);
    }

    public function show(string $id)
    {
        return Movie::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return response()->json($movie, 200);
    }

    public function destroy(string $id)
    {
        Movie::destroy($id);
        return response()->json(null, 204);
    }
}