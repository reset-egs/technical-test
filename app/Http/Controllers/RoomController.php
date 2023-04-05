<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index() {
        // Retrieve all rooms from the database and store them in a variable
        $rooms = Room::all();

        // Return the view with the retrieved data
        return view('rooms/index', ['rooms' => $rooms]);
    }
}
