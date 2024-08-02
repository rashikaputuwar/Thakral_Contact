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
        Schema::create('add_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            // $table->string('user_id')->unique();
            $table->string('password');
            // $table->unsignedBigInteger('employee_id')->nullable()->unique();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->date('expiry_date');
            $table->enum('status', ['Active', 'Inactive', 'Locked'])->default('Active');


            $table->timestamps();

            // $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            // Optionally, add a foreign key constraint if the employees table exists
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_users');
    }
};
