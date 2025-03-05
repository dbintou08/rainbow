<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function destroy(string $id)
    {
        Room::destroy($id);
        return response()->json(null, 204);
    }
}
