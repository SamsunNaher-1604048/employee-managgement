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
            $table->string('employee_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('cv')->nullable();
            $table->string('fingerprint_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('department_head')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('designation');
            $table->string('role')->nullable();
            $table->integer('repoting_boss')->nullable();
            $table->string('leave')->default(20);
            $table->string('status')->nullable();
            $table->string('signature')->nullable();
            $table->string('password');
            $table->string('profile_pic')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
