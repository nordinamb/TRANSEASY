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
        Schema::create('voyages', function (Blueprint $table) {

            $table->id();
            $table->string('depart') ;
            $table->string('destination');
            $table->integer('seatsavb') ;
            $table->integer('price') ;
            $table->date('date_depart')->format('Y-m-d');
            $table->date('heure_depart')->format('H:i') ;
            $table->timestamps();
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voyages');
    }
};
