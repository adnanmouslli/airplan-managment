<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class bookingController extends Controller
{
    function index(Request $request){


        $msgErorr = [
            "The passport is not valid",
        ];

        // $msgCurrect = [
        //     "done booking!!"
        // ];

        $id = $request -> id ;
        $flight = Flight::find($id);

        if(!($flight->availableSeats > 0)){

            return redirect()->route("flight.index" , ["ce" => 0]);

           // return view("user.flight.index" , ["fligths" => $flights , "msgError" => "empty seats!!"]);
        }



        $ce = $request->ce ;
        if(isset($ce)){
            return view("user.booking.booking" , ["flight" => $flight , "msgError"=> $msgErorr[(int)$ce]]);
        }
        else {
            return view("user.booking.booking" , ["flight" => $flight]);
        }

    }

    function store(Request $requset){

        $data = $requset->only(["idFlight" , "fullName" , "nationalId" , "passportNumber" , "paymentMethod"]);

        // 1- cheack passport user

        $inputPassport = $data['passportNumber'];

        if($inputPassport != Auth::user()->passport){
            return redirect()->route("booking.index" , ["id" => $data["idFlight"] , "ce" => 0]);
        }

        Booking::create([
            "fullName" => $data["fullName"],
            "user_id" => $data["nationalId"],
            "passportNumber" => $data["passportNumber"],
            "typePayment" => $data["paymentMethod"],
            "flight_id" => $data["idFlight"],
        ]);

        // 1
        // $flight = Flight::find($data['idFlight']);

        // $newSeats = $flight->availableSeats - 1 ;

        // Flight::find($data['idFlight'])
        //     ->update(['availableSeats' => $newSeats]);

        // 2
        $flight = Flight::find($data['idFlight']);

        $flight->availableSeats = $flight->availableSeats - 1 ;

        $flight->save();


        return redirect()->route("booking.index", ["id" => $data["idFlight"]]);
    }


    public function myBooking()
    {
        try {
            $bookings = Booking::with(['flight', 'flight.airPlane'])
                ->where('user_id', Auth::user()->getAuthIdentifier())
                ->get();

            if ($bookings->isEmpty()) {
                Log::info('No bookings found for user: ' . Auth::user()->getAuthIdentifier());
            }

            $upcomingBookings = $bookings->filter(function($booking) {
                if (!$booking->flight) {
                    Log::warning('Booking without flight found: ' . $booking->id);
                    return false;
                }
                return Carbon::parse($booking->flight->departureDate)->isFuture();
            });

            $pastBookings = $bookings->filter(function($booking) {
                if (!$booking->flight) {
                    return false;
                }
                return Carbon::parse($booking->flight->departureDate)->isPast();
            });

            return view('user.booking.myBooking', compact('upcomingBookings', 'pastBookings'));

        } catch (\Exception $e) {
            Log::error('Error in myBooking: ' . $e->getMessage());
            return back()->with('error', 'حدث خطأ أثناء تحميل الحجوزات');
        }
    }

}
