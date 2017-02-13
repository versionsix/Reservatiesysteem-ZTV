<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class ReservationCustomer extends Model {

	protected $table = 'reservationCustomer';
	public $timestamps = true;

	public function reservationCustomer_hasMany_seatReservation()
	{
		return $this->hasMany('Create_seatReservation_table', 'id');
	}

}