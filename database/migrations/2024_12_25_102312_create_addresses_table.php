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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable(); // Full Name
            $table->string('phone', 10)->nullable(); // Phone number (10 digits)
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State
            $table->string('country')->nullable(); // Country
            $table->string('pincode', 6)->nullable(); // Pincode (6 digits)
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
