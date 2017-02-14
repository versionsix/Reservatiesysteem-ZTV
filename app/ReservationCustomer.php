<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationCustomer extends Model {

	protected $table = 'reservationCustomer';
	public $timestamps = true;

	public function reservationCustomer_hasMany_seatReservation()
	{
		return $this->hasMany('Create_seatReservation_table', 'id');
	}
    public function seatReservation()
    {
        return $this->hasMany('App\SeatReservation', 'id');
    }
    public function performance(){
        return $this->belongsTo('App\Performance');
    }

}