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
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->foreignId('semester_id');
            // $table->foreignId('year');
            // $table->foreign('department_id',1);
            $table->string('course_name');
            $table->integer('credit_hours');
            // $table->foreign('instructor_id',1);
            $table->unsignedBigInteger('instructor_id'); // تم تعديل المفتاح الأجنبي
            $table->tinyInteger('doctor_id')->nullable();
            $table->tinyInteger('assistant_id')->nullable();
            $table->unsignedBigInteger('department_id'); // تم تعديل المفتاح الأجنبي
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
