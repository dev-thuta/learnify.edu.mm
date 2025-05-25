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
        Schema::create('teacher_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->enum('gender', ['male', 'female']);
            $table->date('date_of_birth');
            $table->foreignId('town_id')->constrained('towns')->onDelete('cascade');
            $table->string('street')->nullable();
            $table->year('teaching_since');
            $table->text('qualifications');
            $table->foreignId('certificate_id')->constrained('certificates')->onDelete('cascade');
            $table->boolean('is_online');
            $table->enum('teaching_type', ['teaching', 'guide']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_details');
    }
};
