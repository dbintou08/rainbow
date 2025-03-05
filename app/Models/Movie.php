<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title','category_id','duration','description','image_url'];

    public function category()
{
    return $this->belongsTo(Category::class);
}
    public function screenings()
    {
        return $this->hasMany(Screening::class);
    }

}
