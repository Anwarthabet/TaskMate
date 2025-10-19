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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان المهمة
            $table->text('description')->nullable(); // وصف
               $table->string('file')->nullable(); // مرفق (صورة - PDF - Word - فيديو)
            $table->enum('status', ['pending', 'in_progress', 'done','in_review',])->default('pending'); // حالة المهمة
            $table->date('due_date')->nullable(); // تاريخ الاستحقاق
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade'); // المشروع التابع له
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('cascade'); // المستخدم المكلف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
