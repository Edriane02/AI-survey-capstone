<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_group');
            $table->string('course_code')->unique();
            $table->string('course_description');
            $table->unsignedInteger('course_units');
            $table->foreignId('user_id')->nullable()->constrained('faculty_profiles', 'user_id')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

