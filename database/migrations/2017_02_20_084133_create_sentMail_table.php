<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSentMailTable extends Migration {

	public function up()
	{
		Schema::create('sentMail', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_to');
			$table->string('email_to');
			$table->string('email_content');
			$table->boolean('email_read')->default(false);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sentMail');
	}
}