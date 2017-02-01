<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoorstellingen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voorstellingen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('datum');
            $table->string('uur');
            $table->enum('enabled', ['true', 'false']);
            $table->enum('indelingType', ['vrije_toegang', 'vrije_zetelkeuze', 'vaste_zetelkeuze']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voorstellingen');
    }
}
