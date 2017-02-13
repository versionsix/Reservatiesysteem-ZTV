<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Create_reservationCustomer_table extends Model {

	protected $table = 'reservationCustomer';
	public $timestamps = true;

	public function reservationCustomer_hasMany_seatReservation()
	{
		return $this->hasMany('Create_seatReservation_table', 'id');
	}

}