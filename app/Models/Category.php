<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','description'];
    
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
