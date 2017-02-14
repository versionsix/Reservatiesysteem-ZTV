<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationCustomer extends Model {

	protected $table = 'reservationCustomer';
	public $timestamps = true;

    public function seatReservation()
    {
        return $this->hasMany('App\SeatReservation');
    }

}