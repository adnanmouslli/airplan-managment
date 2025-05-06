<?php

namespace Database\Seeders;

use App\Models\Airplan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirplanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $airplanes = [
        [
            'name' => 'Boeing 777',
            'number' => 'B777-001',
            'type' => 'Wide Body',
            'numberSeat' => '300',
        ],
        [
            'name' => 'Airbus A320',
            'number' => 'A320-001',
            'type' => 'Narrow Body',
            'numberSeat' => '180',
        ],
        [
            'name' => 'Airbus A380',
            'number' => 'A380-001',
            'type' => 'Super Jumbo',
            'numberSeat' => '500',
        ],
        [
            'name' => 'Boeing 787',
            'number' => 'B787-001',
            'type' => 'Dreamliner',
            'numberSeat' => '330',
        ],
        [
            'name' => 'Airbus A350',
            'number' => 'A350-001',
            'type' => 'Wide Body',
            'numberSeat' => '350',
        ],
    ];

    foreach ($airplanes as $airplane) {
        Airplan::create($airplane);
    }
        }
}