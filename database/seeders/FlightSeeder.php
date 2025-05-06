<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $flights = [
        [
            'flightNumber' => 'SV1234',
            'destination' => 'Dubai',
            'departure' => 'Riyadh',
            'availableSeats' => 150,
            'departureDate' => now()->addDays(1),
            'arrivalDate' => now()->addDays(1)->addHours(2),
            'airplan_id' => 1,
            'status' => 'on_time',
            'gate' => 'A1',
            'price' => 1500.00,
            'progress' => 0,
            'terminal' => 'Terminal 1',
            'notes' => 'رحلة مباشرة',
        ],
        [
            'flightNumber' => 'SV1235',
            'destination' => 'Jeddah',
            'departure' => 'Riyadh',
            'availableSeats' => 100,
            'departureDate' => now()->addDays(2),
            'arrivalDate' => now()->addDays(2)->addHours(1),
            'airplan_id' => 2,
            'status' => 'delayed',
            'gate' => 'B2',
            'price' => 800.00,
            'progress' => 0,
            'terminal' => 'Terminal 2',
            'notes' => 'تأخير بسبب الأحوال الجوية',
        ],
        [
            'flightNumber' => 'SV1236',
            'destination' => 'Cairo',
            'departure' => 'Jeddah',
            'availableSeats' => 200,
            'departureDate' => now()->addDays(3),
            'arrivalDate' => now()->addDays(3)->addHours(3),
            'airplan_id' => 3,
            'status' => 'on_time',
            'gate' => 'C3',
            'price' => 2000.00,
            'progress' => 0,
            'terminal' => 'Terminal 1',
            'notes' => 'وجبة ساخنة مجانية',
        ],
        [
            'flightNumber' => 'SV1237',
            'destination' => 'London',
            'departure' => 'Riyadh',
            'availableSeats' => 250,
            'departureDate' => now()->addDays(4),
            'arrivalDate' => now()->addDays(4)->addHours(7),
            'airplan_id' => 4,
            'status' => 'on_time',
            'gate' => 'D4',
            'price' => 3500.00,
            'progress' => 0,
            'terminal' => 'Terminal 2',
            'notes' => 'رحلة دولية مع خدمة الواي فاي',
        ],
        [
            'flightNumber' => 'SV1238',
            'destination' => 'Istanbul',
            'departure' => 'Dammam',
            'availableSeats' => 180,
            'departureDate' => now()->addDays(5),
            'arrivalDate' => now()->addDays(5)->addHours(4),
            'airplan_id' => 5,
            'status' => 'delayed',
            'gate' => 'E5',
            'price' => 2500.00,
            'progress' => 0,
            'terminal' => 'Terminal 3',
            'notes' => 'تشمل خدمة نقل الأمتعة المجانية',
        ],
    ];

    foreach ($flights as $flight) {
        Flight::create($flight);
    }
}


}
