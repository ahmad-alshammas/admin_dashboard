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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id(); // معرف فريد
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // يرتبط بالـ User
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // يرتبط بالـ Course
            $table->timestamps(); // تاريخ الإنشاء والتحديث
            $table->unique(['user_id', 'course_id']); // لضمان عدم إضافة الكورس أكثر من مرة للمستخدم نفسه
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
