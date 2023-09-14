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
        Schema::create('places', function (Blueprint $table) {
             $table->id();
            $table->boolean('status')->default(0);
            // $table->unsignedBigInteger('checkout_id')->nullable();

            $table->timestamps();
            $table->foreignId('voyage_id')->OnDeleteCascade();
            $table->string('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
