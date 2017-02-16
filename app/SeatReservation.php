<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model {

	protected $table = 'seatReservation';
	public $timestamps = true;

    public function seat()
    {
        return $this->hasOne('App\Seat', 'id', 'seat_id');
    }
    public function reservationCustomer()
    {
        return $this->belongsTo('App\ReservationCustomer', 'reservation_customer_id', 'id');
    }

    public function performance()
    {
        return $this->belongsTo('App\Performance', 'performance_id', 'id');
    }



}