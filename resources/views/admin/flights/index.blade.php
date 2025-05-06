@extends('layout.adminApp')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- عنوان الصفحة -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
            إدارة الرحلات
        </h1>
        <a
         {{-- href="{{ route('admin.flights.create') }}" --}}
           class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-2.5 rounded-lg
                  flex items-center gap-2 transition duration-300">
            <i class="fas fa-plus"></i>
            إضافة رحلة جديدة
        </a>
    </div>

    <!-- فلتر البحث -->
    <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6 mb-8">
        <form action="{{ route('admin.flights') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="space-y-2">
                <label class="text-gray-400">رقم الرحلة</label>
                <input type="text" name="flight_number"
                       class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                              focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400">من</label>
                <input type="text" name="departure"
                       class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                              focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400">إلى</label>
                <input type="text" name="destination"
                       class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                              focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
            </div>
            <div class="flex items-end">
                <button type="submit"
                        class="w-full bg-gray-800 hover:bg-gray-700 text-white px-6 py-2.5 rounded-lg
                               flex items-center justify-center gap-2 transition duration-300">
                    <i class="fas fa-search"></i>
                    بحث
                </button>
            </div>
        </form>
    </div>

    <!-- جدول الرحلات -->
    <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-800/50">
                        <th class="px-6 py-4 text-right text-sm text-gray-400">رقم الرحلة</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">من</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">إلى</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">التاريخ</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">الحالة</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">السعر</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">المقاعد المتاحة</th>
                        <th class="px-6 py-4 text-right text-sm text-gray-400">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @forelse($flights as $flight)
                    <tr class="hover:bg-gray-800/30 transition duration-200">
                        <td class="px-6 py-4 text-white">{{ $flight->flightNumber }}</td>
                        <td class="px-6 py-4 text-white">{{ $flight->departure }}</td>
                        <td class="px-6 py-4 text-white">{{ $flight->destination }}</td>
                        <td class="px-6 py-4 text-white">
                            {{ Carbon\Carbon::parse($flight->departureDate)->format('Y/m/d H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs
                                {{ $flight->status === 'on_time' ? 'bg-green-500/20 text-green-400' :
                                   ($flight->status === 'delayed' ? 'bg-yellow-500/20 text-yellow-400' :
                                    'bg-red-500/20 text-red-400') }}">
                                {{ $flight->status === 'on_time' ? 'في الموعد' :
                                   ($flight->status === 'delayed' ? 'متأخرة' : 'ملغية') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-white">{{ number_format($flight->price) }} ل.س</td>
                        <td class="px-6 py-4 text-white">{{ $flight->availableSeats }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a
                                href="{{ route('admin.flights.edit', $flight->id) }}"
                                   class="p-2 bg-sky-500/10 text-sky-400 rounded-lg hover:bg-sky-500/20 transition duration-200">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                     action="{{ route('admin.flights.destroy', $flight->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('هل أنت متأكد من حذف هذه الرحلة؟')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 bg-red-500/10 text-red-400 rounded-lg hover:bg-red-500/20 transition duration-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                            <i class="fas fa-plane-slash text-4xl mb-4"></i>
                            <p>لا توجد رحلات لعرضها</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
