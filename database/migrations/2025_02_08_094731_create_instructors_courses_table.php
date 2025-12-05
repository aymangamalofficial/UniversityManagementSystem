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
        Schema::create('instructors_courses', function (Blueprint $table) {
            $table->id('instructor_course_id');
            $table->foreignId('instructor_id');
            $table->foreignId('course_id');
            // $table->primary(['instructor_id', 'course_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors_courses');
    }
};
