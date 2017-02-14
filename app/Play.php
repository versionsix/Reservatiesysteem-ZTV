<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Play extends Model {

	protected $table = 'play';
	public $timestamps = false;

	public function performance()
	{
		return $this->hasMany('App\Performance');
	}

}