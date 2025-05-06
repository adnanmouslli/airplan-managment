<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class flightController extends Controller
{

    function index(Request $request) {

        $ce = $request->ce ;

        $msgError = [
            "empty seats!!"
        ];

        $flights = Flight::all();


        if(isset($ce))
         return view("user.flight.index" , ["fligths" => $flights , "msgError" => $msgError[(int)$ce]]);

        else
         return view("user.flight.index" , ["fligths" => $flights]);


        }

        public function trackFlight(Request $request)
        {
            $flight = Flight::with('airPlane')->where('flightNumber', $request->flightNumber)->first();

            if (!$flight) {
                return redirect()->back()->with('error', 'رقم الرحلة غير صحيح');
            }

            // حساب نسبة التقدم
            $departure = Carbon::parse($flight->departureDate);
            $arrival = Carbon::parse($flight->arrivalDate);
            $now = Carbon::now('Asia/Damascus');

            if ($now < $departure) {
                $flight->progress = 0;
            } elseif ($now > $arrival) {
                $flight->progress = 100;
            } else {
                $totalDuration = $departure->diffInSeconds($arrival);
                $elapsedDuration = $departure->diffInSeconds($now);
                $flight->progress = ($elapsedDuration / $totalDuration) * 100;
            }

            // حساب الوقت المتبقي للإقلاع
            $remainingTime = null;
            $flightStatus = 'upcoming';


            if ($now < $departure) {
                $diff = $now->diff($departure);
                $remainingTime = [
                    'hours' => $diff->h + ($diff->days * 24), 
                    'minutes' => $diff->i,
                ];
                if (($diff->h + ($diff->days * 24)) <= 1) {
                    $flightStatus = 'soon';
                }
            } else {
                $flightStatus = 'departed';
            }

            return view('user.flight.track', [
                'flight' => $flight,
                'airplan' => $flight->airPlane,
                'remainingTime' => $remainingTime,
                'flightStatus' => $flightStatus
            ]);
        }

        public function searchFlights(Request $request)
        {
            $query = Flight::query();

            if ($request->filled('departure')) {
                $query->where('departure', 'like', '%' . $request->departure . '%');
            }

            if ($request->filled('destination')) {
                $query->where('destination', 'like', '%' . $request->destination . '%');
            }

            $flights = $query->with('airPlane')->get();

            return view('user.flight.search-results', compact('flights'));
        }

}
