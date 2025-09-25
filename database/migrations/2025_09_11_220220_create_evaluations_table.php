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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluator_id')->constrained('users')->onDelete('cascade'); // who gave feedback
            $table->foreignId('evaluatee_id')->constrained('users')->onDelete('cascade'); // who got feedback
            $table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade'); // optional link
            $table->enum('evaluation_type', ['StudentsToFaculty', 'FacultyToCoordinator', 'CoordinatorToFaculty']);
            $table->json('responses'); // survey answers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
