<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    protected $fillable = ['movie_id','room_id','datetime','available_seats'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
