<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model {
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
	protected $table = 'seat';
	public $timestamps = false;
    public function deck()
    {
        return $this->belongsTo('App\Deck');
    }
    public function seatReservation()
    {
        return $this->hasMany('App\SeatReservation');
    }
    public function performance(){
        return $this->hasManyThrough(
            'App\ReservationCustomer', 'App\Performance',
            'id', 'performance_id', 'reservation_customer_id'
        );
    }


}