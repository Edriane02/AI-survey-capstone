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
        Schema::create('faculty_term', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained('faculty_profile', 'faculty_id')->onDelete('cascade');
            $table->foreignId('term_id')->constrained('term')->onDelete('cascade');
            $table->string('faculty_info');
            $table->string('position')->default('Faculty');
            $table->string('school');
            $table->string('rank');
            $table->string('attained_education');
            $table->string('home_units');
            $table->string('department');
            $table->string('faculty_load_path');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_term');
    }
};
