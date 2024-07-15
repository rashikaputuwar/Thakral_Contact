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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // $table->string('emp_code')->unique();
            $table->string('fname');
            $table->string('lname');
            $table->enum('gender', ['female', 'male','others'])->default('male');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('desig_id');
            $table->date('dob');
            $table->date('join_date');
            $table->binary('photo_blob')->nullable();
            $table->timestamps();

             // Define the foreign key constraint
             $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
             $table->foreign('desig_id')->references('id')->on('designations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
