<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number','capacity'];
    
    public function screening()
    {
        return $this->hasMany(Screening::class);
    }
}
