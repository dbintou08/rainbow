<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function destroy(string $id)
    {
        User::destroy($id);
        return response()->json(null,204);
    }
}
