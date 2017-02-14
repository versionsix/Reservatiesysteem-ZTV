<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeatTable extends Migration {

	public function up()
	{
		Schema::create('seat', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('seatNumber')->unique()->nullable();
			$table->integer('rowNumber');
			$table->integer('columnNumber');
			$table->enum('bookable', array('true', 'false'));
			$table->enum('deck', array('Gelijkvloers', '1e_verhoog', '2e_verhoog', '3e_verhoog', '4e_verhoog'))->nullable();
		});
	}

	public function down()
	{
		Schema::drop('seat');
	}
}