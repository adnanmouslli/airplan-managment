@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Error Message -->
    @if (isset($msgError))
    <div class="fixed bottom-4 left-4 z-50 animate-slide-up">
        <div class="bg-red-900/50 backdrop-blur-xl border border-red-800 text-red-200 p-4 rounded-lg shadow-lg">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-400"></i>
                </div>
                <div class="mr-3">
                    <p class="text-sm">{{$msgError}}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Booking Form Container -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-xl overflow-hidden border border-gray-800">
            <!-- Form Header -->
            <div class="bg-gradient-to-l from-blue-900 to-indigo-900 px-8 py-6">
                <h1 class="text-2xl font-bold text-white text-center">حجز الرحلة</h1>
            </div>

            <!-- Form Content -->
            <form id="bookingForm" method="POST" action="{{ route('booking.store')}}" class="px-8 py-6 space-y-6">
                @csrf
                <input type="text" name="idFlight" hidden value="{{$flight->id}}">

                <!-- Flight Number Display -->
                <div class="bg-sky-900/30 backdrop-blur-sm rounded-lg p-4 mb-6 border border-sky-800">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <i class="fas fa-plane text-sky-400"></i>
                            <span class="text-sky-300 font-semibold">رقم الرحلة:</span>
                        </div>
                        <span class="text-sky-400 font-bold">{{$flight->flightNumber}}</span>
                    </div>
                </div>

                <!-- Form Fields -->
                <div class="space-y-6">
                    <!-- Full Name -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-user text-sky-400"></i>
                            <span>الاسم الكامل</span>
                        </label>
                        <input type="text" id="fullName" name="fullName" required
                               class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                      placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                      transition-all">
                    </div>

                    <!-- National ID -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-id-card text-sky-400"></i>
                            <span>رقم الهوية الوطنية</span>
                        </label>
                        <input type="number" id="nationalId" name="nationalId" required
                               class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                      placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                      transition-all">
                    </div>

                    <!-- Passport Number -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-passport text-sky-400"></i>
                            <span>رقم جواز السفر</span>
                        </label>
                        <input type="text" id="passportNumber" name="passportNumber" required
                               class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                      placeholder-gray-500 focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20
                                      transition-all">
                    </div>

                    <!-- Payment Method -->
                    <div class="space-y-2">
                        <label class="flex items-center space-x-2 space-x-reverse text-sm font-medium text-gray-300">
                            <i class="fas fa-credit-card text-sky-400"></i>
                            <span>طريقة الدفع</span>
                        </label>
                        <select id="paymentMethod" name="paymentMethod" required
                                class="w-full bg-gray-800/50 border-2 border-gray-700 rounded-lg p-3 text-gray-300
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 transition-all">
                            <option value="" class="bg-gray-900">اختر طريقة الدفع</option>
                            <option value="creditCard" class="bg-gray-900">بطاقة ائتمان</option>
                            <option value="paypal" class="bg-gray-900">PayPal</option>
                            <option value="bankTransfer" class="bg-gray-900">تحويل بنكي</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit"
                            class="w-full flex justify-center items-center px-6 py-3 rounded-lg text-base font-medium
                                   text-white bg-gradient-to-r from-sky-500/80 to-sky-600/80 hover:from-sky-600/80
                                   hover:to-sky-700/80 focus:outline-none focus:ring-2 focus:ring-offset-2
                                   focus:ring-offset-gray-900 focus:ring-sky-500 transition-all duration-300
                                   transform hover:scale-[1.02] shadow-lg shadow-sky-500/25 group">
                        <i class="fas fa-check-circle ml-2 group-hover:rotate-12 transition-transform"></i>
                        تأكيد الحجز
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes slide-up {
        from {
            transform: translateY(100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .animate-slide-up {
        animation: slide-up 0.3s ease-out forwards;
    }
</style>
@endsection
