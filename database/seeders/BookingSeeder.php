<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // BookingSeeder.php
public function run()
{
    $bookings = [
        [
            'fullName' => 'Mohammed Ahmed',
            'user_id' => 1,
            'passportNumber' => 'P123456789',
            'typePayment' => 'credit_card',
            'flight_id' => 1,
        ],
        [
            'fullName' => 'Sarah Ali',
            'user_id' => 2,
            'passportNumber' => 'P987654321',
            'typePayment' => 'paypal',
            'flight_id' => 2,
        ],
        [
            'fullName' => 'Khalid Hassan',
            'user_id' => 3,
            'passportNumber' => 'P123789456',
            'typePayment' => 'bank_transfer',
            'flight_id' => 3,
        ],
        [
            'fullName' => 'Noor Abdullah',
            'user_id' => 4,
            'passportNumber' => 'P456789123',
            'typePayment' => 'credit_card',
            'flight_id' => 4,
        ],
        [
            'fullName' => 'Omar Yusuf',
            'user_id' => 5,
            'passportNumber' => 'P789123456',
            'typePayment' => 'paypal',
            'flight_id' => 5,
        ],
    ];

    foreach ($bookings as $booking) {
        Booking::create($booking);
    }
}
}
