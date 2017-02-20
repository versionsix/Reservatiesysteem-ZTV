<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Mail\ConfirmReservationMail;
use App\Performance;
use App\ReservationCustomer;
use App\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function test4(){

        $email = new ConfirmReservationMail('Test User', 'TestUser@example.com', 'Hallo');


        Mail::send($email);

        return json_encode($email, JSON_PRETTY_PRINT);
    }

    public function test3(){
        $seats = Performance::with('seatReservation')
            ->get();

        return '<pre>' . json_encode($seats,JSON_PRETTY_PRINT) . '</pre>';
    }
    public function test2()
    {

        //$performance = Performance::with('reservationCustomer','reservationCustomer.seatReservation')->get();

        //$reservationCustomer = ReservationCustomer::with('performance')->get();
        /*
        $seats_reserved = Seat::with('deck', 'seatReservation.reservationCustomer.performance')
            ->whereHas('seatReservation.reservationCustomer.performance', function ($query) {
                $query->where('id', '=', '2');
            })
            ->get();
        //$seats_reserved->load('deck');
        $seats_all = Seat::with('deck');
        $seats_all->load('deck');
        $seats = $seats_all;
        */
        /*
        $seats->load(['seatReservation.reservationCustomer.performance' => function ($query) {
            $query->where('id', '=', '5');
        }]);
        //$seats->load('seatReservation.reservationCustomer.performance');

        $seats = Seat::with('deck', 'seatReservation.reservationCustomer.performance' )
            ->whereHas('performance')

        ->get()
        */
        $id = 1;
        $seats = Seat::with([ 'seatReservation.reservationCustomer' => function($query) use($id){
                $query->where('performance_id', '=', $id);
            }])->get();

        $seats = Seat::with('seatReservation.reservationCustomer')
            ->get();


        /*
        if ($seats->seat_reservation->reservation_customer->performance->isEmpty())
            return $seats->seat_reservation[0];
        */
        /*
        $seats = Seat::with(['seatReservation.reservationCustomer.performance' =>
            function ($query) {
                $query->where('id', '=', '1');
            }],'deck' )
            ->whereHas('deck', function ($query) {
                $query->where('deckNumber', '=', '0');
            })

            ->get();
        */
        /*
        $seats = Seat::with('deck', 'seatReservation.performance' )
            ->whereHas('deck', function ($query) {
                $query->where('deckNumber', '=', '0');
            })

            ->get();
        */
        return view('frontend.test2')
            ->with('data', $seats);
    }


    public function test()
    {

        return view('frontend.test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
