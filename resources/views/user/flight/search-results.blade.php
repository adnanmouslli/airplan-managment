@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Results Header -->
    <div class="max-w-7xl mx-auto mb-8">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-sky-400">نتائج البحث</h1>
            <span class="text-gray-400">{{ $flights->count() }} رحلة</span>
        </div>
    </div>

    <!-- Results Grid -->
    <div class="max-w-7xl mx-auto grid gap-6">
        @forelse ($flights as $flight)
            <!-- Flight Card -->
            <div class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl border border-gray-800
                        hover:shadow-2xl transition-all duration-300">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <!-- Flight Route -->
                    <div class="flex-1 flex items-center gap-8">
                        <!-- Departure -->
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white mb-2">{{ $flight->departure }}</div>
                            <div class="text-gray-400">{{ \Carbon\Carbon::parse($flight->departureDate)->format('h:i A') }}</div>
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($flight->departureDate)->format('Y/m/d') }}</div>
                        </div>

                        <!-- Flight Line -->
                        <div class="flex-1 flex items-center gap-4">
                            <div class="h-0.5 flex-1 bg-gray-700"></div>
                            <i class="fas fa-plane text-sky-400 transform -rotate-45"></i>
                            <div class="h-0.5 flex-1 bg-gray-700"></div>
                        </div>

                        <!-- Destination -->
                        <div class="text-center">
                            <div class="text-2xl font-bold text-white mb-2">{{ $flight->destination }}</div>
                            <div class="text-gray-400">{{ \Carbon\Carbon::parse($flight->arrivalDate)->format('h:i A') }}</div>
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($flight->arrivalDate)->format('Y/m/d') }}</div>
                        </div>
                    </div>

                    <!-- Flight Info -->
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <!-- Price -->
                        <div class="text-center px-4 py-2 bg-sky-500/10 rounded-lg border border-sky-500">
                            <div class="text-sm text-gray-400">السعر</div>
                            <div class="text-xl font-bold text-sky-400">{{ number_format($flight->price, 2) }} SYP</div>
                        </div>

                        <!-- Available Seats -->
                        <div class="text-center px-4 py-2 bg-green-500/10 rounded-lg border border-green-500">
                            <div class="text-sm text-gray-400">المقاعد المتاحة</div>
                            <div class="text-xl font-bold text-green-400">{{ $flight->availableSeats }}</div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('track.flight', ['flightNumber' => $flight->flightNumber]) }}"
                               class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition-colors">
                                <i class="fas fa-search"></i>
                            </a>
                            <a href="{{ route('booking.index', ['id'=> $flight->id]) }}"
                               class="px-4 py-2 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600
                                      hover:to-sky-700 text-white rounded-lg transition-colors">
                                حجز
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <!-- No Results -->
            <div class="text-center py-12">
                <div class="text-6xl text-gray-700 mb-4">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-400 mb-2">لا توجد نتائج</h3>
                <p class="text-gray-500">حاول البحث باستخدام كلمات مختلفة</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
