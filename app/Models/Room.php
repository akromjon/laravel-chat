<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    const ROOM_TYPE_PUBLIC = 1;

    const ROOM_TYPE_PRIVATE = 2;

    protected $guarded=[];

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
