<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayTable extends Migration {

	public function up()
	{
		Schema::create('play', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('enabled', array('false', 'true'));
			$table->string('name');
            $table->text('page_content')->nullable();

        });
	}

	public function down()
	{
		Schema::drop('play');
	}
}