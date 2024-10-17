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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Foreign key to students table
            $table->date('date'); // Date of attendance
            $table->enum('status', ['present', 'absent', 'late']); // Status of attendance
            $table->text('remarks')->nullable(); // Optional remarks
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};

