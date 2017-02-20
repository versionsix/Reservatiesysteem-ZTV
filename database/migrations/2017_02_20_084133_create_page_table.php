<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePageTable extends Migration {

	public function up()
	{
		Schema::create('page', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->text('content');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('page');
	}
}