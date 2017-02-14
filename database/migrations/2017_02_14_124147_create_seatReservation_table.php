<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeatReservationTable extends Migration {

	public function up()
	{
		Schema::create('seatReservation', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('seat_id')->unsigned();
			$table->integer('reservation_customer_id')->unsigned()->nullable();
			$table->enum('state', array('reserved', 'unavailable', 'special'));
			$table->timestamps();
			$table->integer('performance_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('seatReservation');
	}
}