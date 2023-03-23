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
        Schema::create('leave_applies', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->integer('leave_day');
            $table->date('from_date');
            $table->date('to_date');
            $table->date('date_to_join');
            $table->string('leave_type');
            $table->string('resone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_applies');
    }
};
