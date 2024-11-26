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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Adds a 'name' column for the client's name
            $table->string('phonenumber')->nullable(); // Adds a nullable 'phonenumber' column
            $table->string('date'); // Adds a 'date' column, which might represent an appointment date
           
            $table->string('place')->nullable(); // Adds a nullable 'place' column
            $table->string('status');
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
