<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    protected $room;
    public function __construct(Room $room)
    {
        $this->room = $room;
    }
    public function index()
    {
        $rooms = $this->room::select('name', 'room_type')->get();
        return $this->success_data($rooms, 'rooms');
    }

    public function show($room_id)
    {
        $room_chats = $this->room::where('id', $room_id)->with('chats')->get();
        return $this->success_data($room_chats, 'room_chats');
    }
}
