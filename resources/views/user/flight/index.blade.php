@extends("layout.userApp")

@section("color-home")
#fff
@endsection

@section("color-flight")
#ff7b00
@endsection

@section("color-s")
#fff
@endsection

@section("color-a")
#fff
@endsection

@section("content")
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="bg-gradient-to-l from-gray-900/50 to-gray-800/50 backdrop-blur-xl rounded-2xl p-8 mb-12 text-white shadow-xl border border-gray-800">
        <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent text-center mb-4">
            الرحلات المتاحة
        </h1>
        <p class="text-lg text-gray-300 text-center">
            استعرض وقم بحجز رحلتك المفضلة
        </p>
    </div>

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

    <!-- Flights Table -->
    <div class="bg-gray-900/50 backdrop-blur-xl rounded-2xl shadow-lg overflow-hidden border border-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-800">
                <thead>
                    <tr class="bg-gradient-to-l from-blue-900 to-indigo-900">
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            رقم الرحلة
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            المغادرة
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            الوجهة
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            تاريخ المغادرة
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            تاريخ الوصول
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            المقاعد المتوفرة
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-100">
                            الإجراءات
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach ($fligths as $fligth)
                    <tr class="hover:bg-gray-800/50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{$fligth->flightNumber}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{$fligth->departure}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{$fligth->destination}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{$fligth->departureDate}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{$fligth->arrivalDate}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full
                                       {{ $fligth->availableSeats > 10 ? 'bg-green-900/50 text-green-300 border border-green-700' :
                                          ($fligth->availableSeats > 0 ? 'bg-yellow-900/50 text-yellow-300 border border-yellow-700' :
                                           'bg-red-900/50 text-red-300 border border-red-700') }}">
                                {{$fligth->availableSeats}}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('booking.index', ['id'=> $fligth->id]) }}"
                               class="group inline-flex items-center px-4 py-2 bg-gradient-to-r from-sky-500/80 to-sky-600/80
                                      hover:from-sky-600/80 hover:to-sky-700/80 text-white text-sm font-medium rounded-lg
                                      transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2
                                      focus:ring-sky-500 focus:ring-offset-2 focus:ring-offset-gray-900 shadow-lg shadow-sky-500/20">
                                <i class="fas fa-ticket-alt ml-2 group-hover:rotate-12 transition-transform"></i>
                                حجز الآن
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
