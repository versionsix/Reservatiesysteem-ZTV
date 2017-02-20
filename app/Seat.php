<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model {
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
	protected $table = 'seat';
	public $timestamps = false;
    public function seatReservation()
    {
        return $this->hasOne('App\SeatReservation', 'seat_id', 'id');
    }

    public function performance()
    {
        return $this->hasOne('App\Performance', 'id', 'id');
    }
}