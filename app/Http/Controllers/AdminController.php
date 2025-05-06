<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        // إحصائيات عامة
        $totalFlights = Flight::count();
        $totalBookings = Booking::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalRevenue = Booking::join('flights', 'bookings.flight_id', '=', 'flights.id')
            ->sum('flights.price');

        // آخر الحجوزات
        $recentBookings = Booking::with('flight')
            ->latest()
            ->take(5)
            ->get();

        // رحلات اليوم
        $todayFlights = Flight::whereDate('departureDate', Carbon::today())
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'totalFlights',
            'totalBookings',
            'totalUsers',
            'totalRevenue',
            'recentBookings',
            'todayFlights'
        ));
    }

    function showEmployee(){

        //$employees = User::where(["role" , "isAdmin"] ,[], ["employee" , 1])->get();

        $employees = User::where("role" , "=" , "employee")
        ->where("isAdmin" , "=" , "1")
        ->get();

        return view("admin.employee" , ["employees" => $employees]);
    }


    public function flights(Request $request)
    {
        $flights = Flight::query();

        // تطبيق الفلاتر
        if ($request->flight_number) {
            $flights->where('flightNumber', 'like', '%' . $request->flight_number . '%');
        }

        if ($request->departure) {
            $flights->where('departure', 'like', '%' . $request->departure . '%');
        }

        if ($request->destination) {
            $flights->where('destination', 'like', '%' . $request->destination . '%');
        }

        $flights = $flights->latest()->paginate(10);

        return view('admin.flights.index', compact('flights'));
    }


    public function edit($id)
{
    $flight = Flight::findOrFail($id);
    return view('admin.flights.edit', compact('flight'));
}

public function update(Request $request, $id)
{
    $flight = Flight::findOrFail($id);

    $request->validate([
        'flightNumber' => 'required|string',
        'departure' => 'required|string',
        'destination' => 'required|string',
        'departureDate' => 'required|date',
        'arrivalDate' => 'required|date|after:departureDate',
        'availableSeats' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'status' => 'required|in:on_time,delayed,cancelled',
        'gate' => 'nullable|string',
        'terminal' => 'nullable|string',
    ]);

    $flight->update($request->all());

    return redirect()->route('admin.flights')
        ->with('success', 'تم تحديث معلومات الرحلة بنجاح');
}

public function destroy($id)
{
    $flight = Flight::findOrFail($id);

    // التحقق من عدم وجود حجوزات مرتبطة
    if ($flight->bookings()->count() > 0) {
        return back()->with('error', 'لا يمكن حذف هذه الرحلة لوجود حجوزات مرتبطة بها');
    }

    $flight->delete();
    return redirect()->route('admin.flights')
        ->with('success', 'تم حذف الرحلة بنجاح');
}


    function addAdmin(Request $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'passport' => rand(1 , 1000),
            'isAdmin' => 1,
            'role'=> "admin"
        ]);

    }


}
