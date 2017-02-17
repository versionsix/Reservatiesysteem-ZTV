<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePerformanceTable extends Migration {

	public function up()
	{
		Schema::create('performance', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('play_id')->unsigned();
            $table->date('date');
            $table->time('hour');
            $table->enum('enabled', array('true', 'false'));
            $table->enum('seatingType', array('free_admission', 'free_seat_choice', 'fixed_seat_choice'));
            $table->text('page_content');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('performance');
	}
}