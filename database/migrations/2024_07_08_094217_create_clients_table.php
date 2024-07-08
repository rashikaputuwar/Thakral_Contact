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
        Schema::create('client_tables', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->unique();
            $table->string('contact_number')->unique();
            $table->string('email')->nullable()->unique();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
