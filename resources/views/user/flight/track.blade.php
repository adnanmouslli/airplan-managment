@extends("layout.userApp")

@section("content")
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Flight Status Header -->
    <div class="max-w-7xl mx-auto mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold text-sky-400">رحلة رقم {{ $flight->flightNumber }}</h1>
                <p class="text-gray-400">{{ $flight->notes ?? 'رحلة مباشرة' }}</p>
            </div>
            <div class="flex items-center gap-4">
                <!-- Flight Status Badge -->
                <span class="px-4 py-1.5 rounded-full text-sm font-medium border
                    {{ $flight->status == 'on_time' ? 'bg-green-500/20 text-green-400 border-green-500' :
                      ($flight->status == 'delayed' ? 'bg-yellow-500/20 text-yellow-400 border-yellow-500' :
                       'bg-red-500/20 text-red-400 border-red-500') }}">
                    {{ $flight->status == 'on_time' ? 'في الموعد' :
                       ($flight->status == 'delayed' ? 'متأخرة' : 'ملغية') }}
                </span>
                <!-- Price Badge -->
                <span class="px-4 py-1.5 rounded-full bg-sky-500/20 text-sky-400 border border-sky-500 text-sm font-medium">
                    {{ number_format($flight->price, 2) }} SYP
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        <!-- Main Flight Info Card -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Progress Card -->
            <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl border border-gray-800">
                <div class="relative">
                    <!-- Cities and Times -->
                    <div class="flex justify-between items-start mb-12">
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-full bg-sky-500/10 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-plane-departure text-2xl text-sky-400"></i>
                            </div>
                            <div class="text-2xl font-bold text-white mb-2">{{ $flight->departure }}</div>
                            <div class="text-lg text-gray-400">{{ \Carbon\Carbon::parse($flight->departureDate)->format('h:i A') }}</div>
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($flight->departureDate)->format('Y/m/d') }}</div>
                            <div class="mt-2 text-sm text-sky-400">{{ $flight->terminal }} - بوابة {{ $flight->gate }}</div>
                        </div>
                        <div class="flex-1 px-8 self-center">
                            <!-- Progress Bar -->
                            <div class="relative">
                                <div class="h-2 bg-gray-700 rounded-full">
                                    <div class="h-full bg-gradient-to-r from-sky-400 to-sky-600 rounded-full transition-all duration-1000"
                                         style="width: {{ $flight->progress }}%"></div>
                                </div>
                                <div class="absolute -top-8 left-1/2 -translate-x-1/2 text-sky-400 font-medium">
                                    {{ round($flight->progress) }}%
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-full bg-sky-500/10 flex items-center justify-center mb-4 mx-auto">
                                <i class="fas fa-plane-arrival text-2xl text-sky-400"></i>
                            </div>
                            <div class="text-2xl font-bold text-white mb-2">{{ $flight->destination }}</div>
                            <div class="text-lg text-gray-400">{{ \Carbon\Carbon::parse($flight->arrivalDate)->format('h:i A') }}</div>
                            <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($flight->arrivalDate)->format('Y/m/d') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flight Details Card -->
            <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl border border-gray-800">
                <h3 class="text-xl font-bold text-sky-400 mb-6">تفاصيل الرحلة</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="bg-gray-800/50 p-4 rounded-lg">
                        <div class="text-gray-400 mb-2">الطائرة</div>
                        <div class="text-lg font-bold text-white">{{ $airplan->name }}</div>
                        <div class="text-sm text-sky-400">{{ $airplan->type }}</div>
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg">
                        <div class="text-gray-400 mb-2">المقاعد المتاحة</div>
                        <div class="text-lg font-bold text-white">{{ $flight->availableSeats }}</div>
                        <div class="text-sm text-sky-400">من أصل {{ $airplan->numberSeat }}</div>
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg">
                        <div class="text-gray-400 mb-2">مدة الرحلة</div>
                        <div class="text-lg font-bold text-white">
                            {{ \Carbon\Carbon::parse($flight->departureDate)->diffInHours($flight->arrivalDate) }}h
                            {{ \Carbon\Carbon::parse($flight->departureDate)->diffInMinutes($flight->arrivalDate) % 60 }}m
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Countdown and Actions Card -->
        <div class="space-y-8">
            <!-- Countdown Card -->
            <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl border border-gray-800">
                <h3 class="text-xl font-bold {{ $flightStatus === 'soon' ? 'text-yellow-400' : ($flightStatus === 'departed' ? 'text-gray-400' : 'text-sky-400') }} mb-6">
                    @if($flightStatus === 'departed')
                        تم الإقلاع
                    @elseif($flightStatus === 'soon')
                        الإقلاع قريباً
                    @else
                        الوقت المتبقي للإقلاع
                    @endif
                </h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-800/50 p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold text-sky-400 mb-1">
                            {{ $flightStatus !== 'departed' ? str_pad($remainingTime['hours'], 2, '0', STR_PAD_LEFT) : '00' }}
                        </div>
                        <div class="text-sm text-gray-400">ساعة</div>
                    </div>
                    <div class="bg-gray-800/50 p-4 rounded-lg text-center">
                        <div class="text-3xl font-bold text-sky-400 mb-1">
                            {{ $flightStatus !== 'departed' ? str_pad($remainingTime['minutes'], 2, '0', STR_PAD_LEFT) : '00' }}
                        </div>
                        <div class="text-sm text-gray-400">دقيقة</div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-xl border border-gray-800">
                <h3 class="text-xl font-bold text-sky-400 mb-6">خيارات سريعة</h3>
                <div class="space-y-4">
                    <a href="{{ route('booking.index', ['id'=> $flight->id]) }}"
                       class="w-full flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-sky-500 to-sky-600
                              hover:from-sky-600 hover:to-sky-700 text-white rounded-lg transition-all duration-200
                              transform hover:scale-105">
                        <i class="fas fa-ticket-alt"></i>
                        حجز تذكرة
                    </a>
                    <button onclick="shareFlightInfo()"
                            class="w-full flex items-center justify-center gap-2 px-6 py-3 bg-gray-800 hover:bg-gray-700
                                   text-white rounded-lg transition-colors">
                        <i class="fas fa-share-alt"></i>
                        مشاركة معلومات الرحلة
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
  
    // دالة مشاركة معلومات الرحلة
    function shareFlightInfo() {
        const flightInfo = {
            number: '{{ $flight->flightNumber }}',
            from: '{{ $flight->departure }}',
            to: '{{ $flight->destination }}',
            date: '{{ \Carbon\Carbon::parse($flight->departureDate)->translatedFormat("l d F Y") }}',
            time: '{{ \Carbon\Carbon::parse($flight->departureDate)->format("h:i A") }}',
            status: '{{ $flight->status === "on_time" ? "في الموعد" : ($flight->status === "delayed" ? "متأخرة" : "ملغية") }}'
        };

                const text = `رحلة رقم: ${flightInfo.number}
        من: ${flightInfo.from}
        إلى: ${flightInfo.to}
        التاريخ: ${flightInfo.date}
        الوقت: ${flightInfo.time}
        الحالة: ${flightInfo.status}`;

                if (navigator.share) {
                    navigator.share({
                        title: 'معلومات الرحلة',
                        text: text
                    }).catch(console.error);
                } else {
                    navigator.clipboard.writeText(text)
                        .then(() => alert('تم نسخ معلومات الرحلة!'))
                        .catch(() => alert('حدث خطأ أثناء نسخ المعلومات'));
                }
            }
</script>
@endpush
@endsection
