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
          Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // اسم المشروع
            $table->text('description')->nullable(); // وصف المشروع
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending'); // حالة المشروع
            $table->foreignId('owner_id')->constrained('users'); // مالك المشروع
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
