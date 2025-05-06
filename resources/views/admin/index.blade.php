@extends("layout.adminApp")

@section("content")
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="bg-gradient-to-l from-gray-900/50 to-gray-800/50 backdrop-blur-xl rounded-2xl p-12 mb-12 text-white shadow-xl border border-gray-800 transform hover:scale-[1.02] transition-transform duration-300">
        <div class="relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                لوحة تحكم إدارة النظام
            </h1>
            <p class="text-xl md:text-2xl text-gray-300">إدارة وتتبع جميع عمليات النظام من مكان واحد</p>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <!-- Total Flights -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6 hover:border-sky-500/50 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm">إجمالي الرحلات</p>
                    <h3 class="text-2xl font-bold text-white mt-2">{{ $totalFlights }}</h3>
                </div>
                <div class="bg-sky-500/10 p-3 rounded-xl">
                    <i class="fas fa-plane text-sky-400"></i>
                </div>
            </div>
        </div>

        <!-- Total Bookings -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6 hover:border-sky-500/50 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm">إجمالي الحجوزات</p>
                    <h3 class="text-2xl font-bold text-white mt-2">{{ $totalBookings }}</h3>
                </div>
                <div class="bg-sky-500/10 p-3 rounded-xl">
                    <i class="fas fa-ticket-alt text-sky-400"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6 hover:border-sky-500/50 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm">المستخدمون</p>
                    <h3 class="text-2xl font-bold text-white mt-2">{{ $totalUsers }}</h3>
                </div>
                <div class="bg-sky-500/10 p-3 rounded-xl">
                    <i class="fas fa-users text-sky-400"></i>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6 hover:border-sky-500/50 transition-all duration-300">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-400 text-sm">إجمالي الإيرادات</p>
                    <h3 class="text-2xl font-bold text-white mt-2">{{ number_format($totalRevenue) }} ل.س</h3>
                </div>
                <div class="bg-sky-500/10 p-3 rounded-xl">
                    <i class="fas fa-dollar-sign text-sky-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Today's Flights -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-sky-400">رحلات اليوم</h3>
                <span class="text-sm text-gray-400">{{ $todayFlights->count() }} رحلة</span>
            </div>
            <div class="space-y-4">
                @forelse($todayFlights as $flight)
                    <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg">
                        <div class="flex items-center gap-4">
                            <div class="bg-sky-500/10 p-3 rounded-xl">
                                <i class="fas fa-plane text-sky-400"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">{{ $flight->flightNumber }}</h4>
                                <p class="text-gray-400 text-sm">{{ $flight->departure }} - {{ $flight->destination }}</p>
                            </div>
                        </div>
                        <div>
                            <span class="px-3 py-1 rounded-full text-xs {{ $flight->status == 'on_time' ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }}">
                                {{ $flight->status == 'on_time' ? 'في الموعد' : 'متأخرة' }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <i class="fas fa-plane-slash text-4xl mb-3"></i>
                        <p>لا توجد رحلات اليوم</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-sky-400">آخر الحجوزات</h3>
                <span class="text-sm text-gray-400">{{ $recentBookings->count() }} حجز</span>
            </div>
            <div class="space-y-4">
                @forelse($recentBookings as $booking)
                    <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-lg">
                        <div class="flex items-center gap-4">
                            <div class="bg-sky-500/10 p-3 rounded-xl">
                                <i class="fas fa-ticket-alt text-sky-400"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-medium">{{ $booking->fullName }}</h4>
                                <p class="text-gray-400 text-sm">رحلة #{{ $booking->flight->flightNumber }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-medium">{{ number_format($booking->flight->price) }} ل.س</p>
                            <p class="text-sm text-gray-400">{{ $booking->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <i class="fas fa-ticket-alt text-4xl mb-3"></i>
                        <p>لا توجد حجوزات حديثة</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <a
        href="{{ route('admin.flights.create') }}"
           class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl border border-gray-800 hover:border-sky-500/50
                  transition-all duration-300 text-center group">
            <div class="bg-sky-500/10 h-16 w-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-plus text-2xl text-sky-400 group-hover:scale-110 transition-transform"></i>
            </div>
            <h3 class="text-white font-medium">إضافة رحلة</h3>
        </a>

        <a
        href="{{ route('admin.employees.create') }}"
           class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl border border-gray-800 hover:border-sky-500/50
                  transition-all duration-300 text-center group">
            <div class="bg-sky-500/10 h-16 w-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-plus text-2xl text-sky-400 group-hover:scale-110 transition-transform"></i>
            </div>
            <h3 class="text-white font-medium">إضافة موظف</h3>
        </a>

        <a
        href="{{ route('admin.reports') }}"
           class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl border border-gray-800 hover:border-sky-500/50
                  transition-all duration-300 text-center group">
            <div class="bg-sky-500/10 h-16 w-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-chart-bar text-2xl text-sky-400 group-hover:scale-110 transition-transform"></i>
            </div>
            <h3 class="text-white font-medium">التقارير</h3>
        </a>

        <a
        href="{{ route('admin.settings') }}"
           class="bg-gray-900/50 backdrop-blur-xl p-6 rounded-xl border border-gray-800 hover:border-sky-500/50
                  transition-all duration-300 text-center group">
            <div class="bg-sky-500/10 h-16 w-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-cog text-2xl text-sky-400 group-hover:scale-110 transition-transform"></i>
            </div>
            <h3 class="text-white font-medium">الإعدادات</h3>
        </a>
    </div> --}}
</div>
@endsection
