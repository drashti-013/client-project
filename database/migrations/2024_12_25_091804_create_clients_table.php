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
            $table->id('client_id'); // Auto-incrementing ID
            $table->string('name'); // Full Name
            $table->string('email')->unique(); // Email Address (Unique)
            $table->string('password'); // Password
            $table->enum('gender', ['Male', 'Female', 'Other']); // Gender
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State
            $table->string('country')->nullable(); // Country
            $table->string('pincode', 6)->nullable();
            $table->string('phone', 10); // Phone number (10 digits)
            $table->timestamps(); // Created at & Updated at timestamps
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
