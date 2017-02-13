<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeckTable extends Migration {

	public function up()
	{
		Schema::create('deck', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('deckNumber')->unique();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('deck');
	}
}