<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeatTable extends Migration {

	public function up()
	{
		Schema::create('seat', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('seatNumber')->unique();
			$table->integer('rowNumber');
			$table->integer('columnNumber');
		});
	}

	public function down()
	{
		Schema::drop('seat');
	}
}