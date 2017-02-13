<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('performance', function(Blueprint $table) {
			$table->foreign('play_id')->references('id')->on('play')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('seat', function(Blueprint $table) {
			$table->foreign('deck_id')->references('id')->on('deck')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('reservationCustomer', function(Blueprint $table) {
			$table->foreign('performance_id')->references('id')->on('performance')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('seatReservation', function(Blueprint $table) {
			$table->foreign('seat_id')->references('id')->on('seat')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('performance', function(Blueprint $table) {
			$table->dropForeign('performance_play_id_foreign');
		});
		Schema::table('seat', function(Blueprint $table) {
			$table->dropForeign('seat_deck_id_foreign');
		});
		Schema::table('reservationCustomer', function(Blueprint $table) {
			$table->dropForeign('reservationCustomer_performance_id_foreign');
		});
		Schema::table('seatReservation', function(Blueprint $table) {
			$table->dropForeign('seatReservation_seat_id_foreign');
		});
	}
}