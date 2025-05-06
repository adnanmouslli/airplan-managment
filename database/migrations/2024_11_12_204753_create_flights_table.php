<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flightNumber');
            $table->string('destination');
            $table->string('departure');
            $table->integer('availableSeats');
            $table->datetime('departureDate');
            $table->datetime('arrivalDate');
            $table->integer('airplan_id');
            // الحقول الجديدة
            $table->string('status')->default('on_time'); // حالة الرحلة (on_time, delayed, cancelled)
            $table->string('gate')->nullable(); // بوابة الصعود
            $table->decimal('price', 10, 2); // سعر الرحلة
            $table->integer('progress')->default(0); // نسبة تقدم الرحلة
            $table->string('terminal')->nullable(); // المبنى
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
