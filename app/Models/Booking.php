<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        "fullName" ,
        "user_id",
        "passportNumber" ,
        "typePayment",
        "flight_id",
    ];

    protected $with = ['flight'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }


    use HasFactory;
}
