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
			$table->integer('deck_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('seat');
	}
}