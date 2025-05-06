@extends('layout.userApp')

@section('content')

<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-900/50 rounded-xl border border-gray-800 overflow-hidden">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-6">
                <i class="fas fa-calendar-alt text-2xl text-sky-400"></i>
                <h1 class="text-2xl font-bold text-white">حجوزاتي ومواعيدي</h1>
            </div>

            {{-- Tabs Navigation --}}
            <div class="border-b border-gray-800 mb-6">
                <div class="flex gap-4">
                    <button onclick="switchTab('upcoming')"
                            id="upcomingTab"
                            class="px-4 py-2 text-sky-400 border-b-2 border-sky-400 font-medium">
                        الرحلات القادمة
                    </button>
                    <button onclick="switchTab('past')"
                            id="pastTab"
                            class="px-4 py-2 text-gray-400 hover:text-sky-400 transition-colors duration-300">
                        الرحلات السابقة
                    </button>
                </div>
            </div>

            {{-- Upcoming Flights Tab --}}
            <div id="upcomingContent" class="space-y-4">
                @forelse($upcomingBookings as $booking)
                    <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700 hover:border-sky-500/50 transition-all duration-300">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Flight Info --}}
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-plane text-sky-400"></i>
                                    <span class="text-lg font-semibold text-white">{{ $booking->flight->flightNumber }}</span>
                                    <span class="text-sm {{ $booking->flight->status === 'on_time' ? 'text-green-400' : ($booking->flight->status === 'delayed' ? 'text-yellow-400' : 'text-red-400') }}">
                                        {{ $booking->flight->status === 'on_time' ? 'في الموعد' : ($booking->flight->status === 'delayed' ? 'متأخرة' : 'ملغية') }}
                                    </span>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">من:</span>
                                        <span class="text-white">{{ $booking->flight->departure }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">إلى:</span>
                                        <span class="text-white">{{ $booking->flight->destination }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Time Info --}}
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <i class="fas fa-clock text-sky-400"></i>
                                    <span class="text-gray-400">الوقت المتبقي:</span>
                                </div>

                                @php
                                    $departure = \Carbon\Carbon::parse($booking->flight->departureDate);
                                    $now = \Carbon\Carbon::now();
                                    $diff = $departure->diff($now);
                                @endphp

                                <div class="grid grid-cols-3 gap-2 text-center">
                                    <div class="bg-gray-700/50 rounded-lg p-2">
                                        <div class="text-xl font-bold text-white">{{ $diff->days }}</div>
                                        <div class="text-xs text-gray-400">يوم</div>
                                    </div>
                                    <div class="bg-gray-700/50 rounded-lg p-2">
                                        <div class="text-xl font-bold text-white">{{ $diff->h }}</div>
                                        <div class="text-xs text-gray-400">ساعة</div>
                                    </div>
                                    <div class="bg-gray-700/50 rounded-lg p-2">
                                        <div class="text-xl font-bold text-white">{{ $diff->i }}</div>
                                        <div class="text-xs text-gray-400">دقيقة</div>
                                    </div>
                                </div>
                            </div>

                            {{-- Progress Info --}}
                            <div>
                                <div class="mb-2">
                                    <span class="text-gray-400">تقدم الرحلة:</span>
                                    <span class="text-white mr-2">{{ $booking->flight->progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-700 rounded-full h-2">
                                    <div class="bg-sky-400 h-2 rounded-full transition-all duration-300"
                                         style="width: {{ $booking->flight->progress }}%"></div>
                                </div>
                                <div class="mt-3 space-y-1 text-sm">
                                    <div class="flex items-center gap-2">
                                        <span class="text-gray-400">البوابة:</span>
                                        <span class="text-white">{{ $booking->flight->gate ?? 'غير محدد' }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-gray-400">المبنى:</span>
                                        <span class="text-white">{{ $booking->flight->terminal ?? 'غير محدد' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <i class="fas fa-plane-slash text-4xl mb-3"></i>
                        <p>لا توجد رحلات قادمة</p>
                    </div>
                @endforelse
            </div>

            {{-- Past Flights Tab --}}
            <div id="pastContent" class="hidden space-y-4">
                @forelse($pastBookings as $booking)
                    <div class="bg-gray-800/50 rounded-xl p-6 border border-gray-700">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {{-- Flight Info --}}
                            <div>
                                <div class="flex items-center gap-3 mb-3">
                                    <i class="fas fa-plane text-sky-400"></i>
                                    <span class="text-lg font-semibold text-white">{{ $booking->flight->flightNumber }}</span>
                                    <span class="text-sm {{ $booking->flight->status === 'on_time' ? 'text-green-400' : ($booking->flight->status === 'delayed' ? 'text-yellow-400' : 'text-red-400') }}">
                                        {{ $booking->flight->status === 'on_time' ? 'في الموعد' : ($booking->flight->status === 'delayed' ? 'متأخرة' : 'ملغية') }}
                                    </span>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">من:</span>
                                        <span class="text-white">{{ $booking->flight->departure }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">إلى:</span>
                                        <span class="text-white">{{ $booking->flight->destination }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">الطائرة:</span>
                                        <span class="text-white">{{ $booking->flight->airPlane->name }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Time Info --}}
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <i class="fas fa-clock text-sky-400"></i>
                                    <span class="text-gray-400">تفاصيل الوقت:</span>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">موعد المغادرة:</span>
                                        <span class="text-white">{{ \Carbon\Carbon::parse($booking->flight->departureDate)->format('Y-m-d H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">موعد الوصول:</span>
                                        <span class="text-white">{{ \Carbon\Carbon::parse($booking->flight->arrivalDate)->format('Y-m-d H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Additional Info --}}
                            <div>
                                <div class="mb-2">
                                    <span class="text-gray-400">معلومات الحجز:</span>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-400">رقم الجواز:</span>
                                        <span class="text-white">{{ $booking->passportNumber }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-400">البوابة:</span>
                                        <span class="text-white">{{ $booking->flight->gate ?? 'غير محدد' }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-400">المبنى:</span>
                                        <span class="text-white">{{ $booking->flight->terminal ?? 'غير محدد' }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-gray-400">طريقة الدفع:</span>
                                        <span class="text-white">{{ $booking->typePayment }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <i class="fas fa-history text-4xl mb-3"></i>
                        <p>لا توجد رحلات سابقة</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function switchTab(tab) {
        const upcomingTab = document.getElementById('upcomingTab');
        const pastTab = document.getElementById('pastTab');
        const upcomingContent = document.getElementById('upcomingContent');
        const pastContent = document.getElementById('pastContent');

        if (tab === 'upcoming') {
            upcomingTab.classList.add('text-sky-400', 'border-b-2', 'border-sky-400');
            upcomingTab.classList.remove('text-gray-400');
            pastTab.classList.remove('text-sky-400', 'border-b-2', 'border-sky-400');
            pastTab.classList.add('text-gray-400');
            upcomingContent.classList.remove('hidden');
            pastContent.classList.add('hidden');
        } else {
            pastTab.classList.add('text-sky-400', 'border-b-2', 'border-sky-400');
            pastTab.classList.remove('text-gray-400');
            upcomingTab.classList.remove('text-sky-400', 'border-b-2', 'border-sky-400');
            upcomingTab.classList.add('text-gray-400');
            pastContent.classList.remove('hidden');
            upcomingContent.classList.add('hidden');
        }
    }
</script>
@endpush
@endsection
