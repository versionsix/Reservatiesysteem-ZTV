<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model {

	protected $table = 'performance';
	public $timestamps = true;


	public function play()
	{
        return $this->belongsTo('App\Performance', 'id', 'play_id');
	}
    public function seatReservation()
    {
        return $this->hasMany('App\SeatReservation', 'performance_id', 'd');
    }


}