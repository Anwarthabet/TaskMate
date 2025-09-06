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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
              $table->string('username')->unique();

            $table->string('password');
            $table->timestamp('sign_up_date')->nullable();
            $table->timestamp('last_login')->Nullable();
            $table->string('account_status',20)->defaultaul('active');
            $table->string('profile_picture')->nullable();
            $table->string('role',20)->default('user');  
                        $table->timestamp('updated_at')->Nullable();
                                                $table->timestamp('created_at')->Nullable();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
