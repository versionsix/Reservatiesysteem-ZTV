<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationCustomerTable extends Migration {

	public function up()
	{
		Schema::create('reservationCustomer', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('performance_id')->unsigned();
			$table->string('firstName');
			$table->string('surName');
			$table->string('address1');
			$table->string('place');
			$table->string('zipCode');
			$table->string('email');
			$table->string('telephoneNumber');
			$table->string('comment');
		});
	}

	public function down()
	{
		Schema::drop('reservationCustomer');
	}
}