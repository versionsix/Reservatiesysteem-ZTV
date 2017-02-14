<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model {

	protected $table = 'seatReservation';
	public $timestamps = true;

    public function seat()
    {
        return $this->hasOne('App\Seat');
    }
    public function reservationCustomer()
    {
        return $this->belongsTo('App\ReservationCustomer');
    }
    /*
    public function performance()
    {
        return $this->hasManyThrough(
            'App\ReservationCustomer', 'App\Performance',
            'id', 'performance_id', 'reservation_customer_id'
        );
    }
    */

}