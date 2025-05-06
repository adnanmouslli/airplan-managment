<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\flightController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;






Route::post("/getAllUser" , [AdminController::class , "getUser"]);



// welcome
Route::get("/" , function () {
   return view("welcome");
});


Route::get("/login" , [AuthController::class , "showLoginForm"])->name("login");


Route::post('/login', [AuthController::class, 'login']);

Route::get("/register" , [AuthController::class , "showSignupForm"]);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', function(){
   Auth::logout();
   return redirect()->route("login");
})->name("logout");


// user
Route::get("/home" , [homeController::class , "index"])->name('home.index');
Route::get("/flight/{ce?}" , [flightController::class , "index"])->name('flight.index');
Route::get("/booking/{id}/{ce?}" , [bookingController::class , "index"])->name('booking.index');
Route::post("/booking" , [bookingController::class , "store"])->name("booking.store");
Route::get("/profile/update" , [ProfileController::class , "edit"])->name("profile.edit");
Route::post("/profile/update/{id}" , [ProfileController::class , "update"])->name("profile.update");
Route::get("/profile/editPassword" , [ProfileController::class , "editPassword"])->name("profile.editPassword");
Route::get("/profile/{ce?}" , [ProfileController::class , "index"])->name("profile.index");
Route::post("/profile/updatePassword/{id}" , [ProfileController::class , "updatePassword"])->name("profile.updatePassword");

Route::post('/track-flight', [FlightController::class, 'trackFlight'])->name('track.flight');
Route::get('/search-flights', [FlightController::class, 'searchFlights'])->name('search.flights');
Route::get('/bookings/myBooking', [BookingController::class, 'myBooking'])->name('bookings.myBooking');

// admin
Route::get("/admin/home" , [AdminController::class , "index"])->name("admin.index");
Route::get("/admin/employee" , [AdminController::class , "showEmployee"])->name("admin.showEmployee");
Route::get('admin/flights', [AdminController::class, 'flights'])->name("admin.flights");
 // عرض صفحة تعديل الرحلة
 Route::get('/admin/flights/{flight}/edit', [AdminController::class, 'edit'])
 ->name('admin.flights.edit');
// حفظ تعديلات الرحلة
Route::put('/admin/flights/{flight}', [AdminController::class, 'update'])
 ->name('admin.flights.update');
// حذف الرحلة
Route::delete('/admin/flights/{flight}', [AdminController::class, 'destroy'])
 ->name('admin.flights.destroy');



 
Route::post('/upload-image', function(Request $request){

     $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // تخزين الصورة في مجلد `public/images`
        $path = $request->file('image')->store('images', 'public');

        // إرجاع مسار الصورة المخزنة
        return response()->json([
            'message' => 'تم رفع الصورة بنجاح!',
            'path' => Storage::url($path),
        ]);

})->name('image.upload');

Route::get("/test" , function(){
   return view("test");
});


// Route::get("/test" , function() {

//    $user = User::find(1);

//    $flights = $user->flights()->with("airPlane")->get();


//   foreach ($flights as $flight) {
//         echo "Trip ID: " . $flight->id . "\n";
//         echo "Plane: " . $flight->airPlane->name . "\n";
//     }


// });

// CRUD


Route::get("/addAdmin" , function (){
   return view("admin.addAdmin");
});

Route::post("/addAdmin" , [AdminController::class , "addAdmin"]);


// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

// Route::get('/register', [AuthController::class, 'showSignupForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/home', function () {




//    $isAdmin = Auth::user()->isAdmin;
//    if($isAdmin == 0) {
//       $name = "user:";
//    }
//    else $name = "admin";

//    $role = Auth::user()->role ;


//    if($isAdmin == 0)
//       $name = $name . $role ;

//    if (Auth::user()->isAdmin === 1) {
//       // View admin dashboard
//       return view('admin.home' , ["name" => $name] );
//   } else {
//       // View regular dashboard
//       return view('user.home' , ["name" => $name] );
//   }

// }) -> middleware("auth");



// // employee
// Route::middleware( 'user:employee')->group(function () {


//    Route::get("/employee/add" , function () {
//       return "add in user" ;
//    });


// });

// // manager
// Route::middleware( 'user:manager')->group(function () {

//    Route::get("/manager/add" , function () {
//       return "add in user" ;
//    });


// });





// // admin
// Route::middleware( 'admin')->group(function () {

//    Route::get("/admin/add" , function () {
//       return "add in admin" ;
//    });


// });
