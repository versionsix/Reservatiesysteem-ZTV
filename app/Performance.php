<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model {

	protected $table = 'performance';
	public $timestamps = true;

	public function performance_hasMany_reservationCustomer()
	{
		return $this->hasMany('Create_reservationCustomer_table', 'id');
	}

	public function performance_hasMany()
	{
		return $this->hasMany('Create_seat_table', 'id');
	}

}