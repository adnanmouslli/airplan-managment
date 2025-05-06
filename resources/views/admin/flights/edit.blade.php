@extends('layout.adminApp')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- عنوان الصفحة -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-sky-400 to-indigo-400 bg-clip-text text-transparent">
                تعديل معلومات الرحلة
            </h1>
            <p class="text-gray-400 mt-2">{{ $flight->flightNumber }}</p>
        </div>

        <!-- نموذج التعديل -->
        <div class="bg-gray-900/50 backdrop-blur-xl rounded-xl border border-gray-800 p-6">
            <form action="{{ route('admin.flights.update', $flight->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- رقم الرحلة -->
                    <div class="space-y-2">
                        <label class="text-gray-400">رقم الرحلة</label>
                        <input type="text" name="flightNumber" value="{{ $flight->flightNumber }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('flightNumber')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- من -->
                    <div class="space-y-2">
                        <label class="text-gray-400">من</label>
                        <input type="text" name="departure" value="{{ $flight->departure }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('departure')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- إلى -->
                    <div class="space-y-2">
                        <label class="text-gray-400">إلى</label>
                        <input type="text" name="destination" value="{{ $flight->destination }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('destination')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- تاريخ المغادرة -->
                    <div class="space-y-2">
                        <label class="text-gray-400">تاريخ المغادرة</label>
                        <input type="datetime-local" name="departureDate" value="{{ date('Y-m-d\TH:i', strtotime($flight->departureDate)) }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('departureDate')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- تاريخ الوصول -->
                    <div class="space-y-2">
                        <label class="text-gray-400">تاريخ الوصول</label>
                        <input type="datetime-local" name="arrivalDate" value="{{ date('Y-m-d\TH:i', strtotime($flight->arrivalDate)) }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('arrivalDate')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- السعر -->
                    <div class="space-y-2">
                        <label class="text-gray-400">السعر</label>
                        <input type="number" name="price" value="{{ $flight->price }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('price')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- المقاعد المتاحة -->
                    <div class="space-y-2">
                        <label class="text-gray-400">المقاعد المتاحة</label>
                        <input type="number" name="availableSeats" value="{{ $flight->availableSeats }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        @error('availableSeats')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- الحالة -->
                    <div class="space-y-2">
                        <label class="text-gray-400">الحالة</label>
                        <select name="status" class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                                   focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                            <option value="on_time" {{ $flight->status === 'on_time' ? 'selected' : '' }}>في الموعد</option>
                            <option value="delayed" {{ $flight->status === 'delayed' ? 'selected' : '' }}>متأخرة</option>
                            <option value="cancelled" {{ $flight->status === 'cancelled' ? 'selected' : '' }}>ملغية</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- البوابة -->
                    <div class="space-y-2">
                        <label class="text-gray-400">البوابة</label>
                        <input type="text" name="gate" value="{{ $flight->gate }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    </div>

                    <!-- المبنى -->
                    <div class="space-y-2">
                        <label class="text-gray-400">المبنى</label>
                        <input type="text" name="terminal" value="{{ $flight->terminal }}"
                               class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-2.5 text-white
                                      focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                    </div>
                </div>

                <!-- أزرار التحكم -->
                <div class="flex items-center justify-end gap-4 mt-8">
                    <a href="{{ route('admin.flights') }}"
                       class="px-6 py-2.5 rounded-lg border border-gray-700 text-gray-400 hover:bg-gray-800 transition duration-300">
                        إلغاء
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-lg bg-sky-500 hover:bg-sky-600 text-white transition duration-300">
                        حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
