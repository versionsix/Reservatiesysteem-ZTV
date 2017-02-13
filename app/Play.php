<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Play extends Model {

	protected $table = 'play';
	public $timestamps = false;

	public function play_hasMany_performance()
	{
		return $this->hasMany('Create_performance_table', 'play_id');
	}

}