<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model {

	protected $table = 'seatReservation';
	public $timestamps = true;

	public function seatReservation_hasOne_seat()
	{
		return $this->hasOne('Create_seat_table', 'id');
	}

}