<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model {

	protected $table = 'performance';
	public $timestamps = true;


	public function play()
	{
        return $this->hasOne('App\Performance');
	}
    public function seatReservation()
    {
        return $this->hasMany('App\SeatReservation');
    }


}