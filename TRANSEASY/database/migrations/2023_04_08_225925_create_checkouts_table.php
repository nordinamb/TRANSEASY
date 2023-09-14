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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->OnDeleteCascade();
            $table->string('first_name',25) ;
            $table->string('last_name',25) ;
            $table->string('email',33) ;
            $table->string('phone_number',17) ;
            $table->string('addresse',40) ;
            $table->string('ville',15) ;
            $table->string('code_postal',12) ;
            $table->string('token',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
