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
        return $this->hasOne('App\SeatReservation');
    }


}