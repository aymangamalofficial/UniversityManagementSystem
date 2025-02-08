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
        Schema::create('qrcode', function (Blueprint $table) {
            $table->id('qr_code_id');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('generated_by')->constrained('instructors')->onDelete('cascade');
            $table->string('qr_code_value')->unique();
            $table->dateTime('expiry_time');
            $table->string('session_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcode');
    }
};
