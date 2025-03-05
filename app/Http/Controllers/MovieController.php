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

    public function show(string $id)
    {
        return Movie::findOrFail($id);
    }

    public function destroy(string $id)
    {
        Movie::destroy($id);
        return response()->json(null, 204);
    }
}
