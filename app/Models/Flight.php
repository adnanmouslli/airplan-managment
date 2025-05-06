<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    protected $fillable = [
        'flightNumber',
        'departure',
        'destination',
        'availableSeats',
        'departureDate',
        'arrivalDate',
        'airplan_id',
        'status',
        'gate',
        'price',
        'progress',
        'terminal',
        'notes'
    ];


   public function users()
    {
        return $this->belongsToMany(User::class, 'bookings', 'flight_id', 'user_id');
    }

    public function airPlane()
    {
        return $this->belongsTo(Airplan::class, "airplan_id");
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    

    use HasFactory;
}
