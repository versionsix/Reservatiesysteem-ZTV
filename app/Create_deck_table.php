<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Create_deck_table extends Model {

	protected $table = 'deck';
	public $timestamps = false;

	public function deck_hasMany_seat()
	{
		return $this->hasMany('Create_seat_table', 'deck_id');
	}

}