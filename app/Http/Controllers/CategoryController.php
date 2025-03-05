<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function destroy(string $id)
    {
        Category::destroy($id);
        return response()->json(null, 204);
    }
}
