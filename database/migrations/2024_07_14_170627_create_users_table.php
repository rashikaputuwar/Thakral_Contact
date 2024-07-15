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
            // $table->string('user_id')->unique();
            $table->string('password');
            $table->string('user_name');
            $table->unsignedBigInteger('employee_id')->nullable()->unique();
            $table->date('expiry_date');
            $table->enum('status', ['active', 'inactive', 'locked'])->default('active');


            // $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
