<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Message;

class Chat extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

}
