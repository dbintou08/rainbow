<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable= ['user_id','screening_id','number_of_tickets','status','total_amount'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function screening()
    {
        return $this->belongsTo(Screening::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
