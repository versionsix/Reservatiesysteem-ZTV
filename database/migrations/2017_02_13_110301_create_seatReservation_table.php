<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeatReservationTable extends Migration {

	public function up()
	{
		Schema::create('seatReservation', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('seat_id')->unsigned();
			$table->string('reservationCustomer_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('seatReservation');
	}
}