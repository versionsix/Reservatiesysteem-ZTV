<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Performance;
use App\ReservationCustomer;
use App\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test2()
    {

        //$performance = Performance::with('reservationCustomer','reservationCustomer.seatReservation')->get();

        //$reservationCustomer = ReservationCustomer::with('performance')->get();

        $seats_reserved = Seat::with('deck', 'seatReservation.reservationCustomer.performance')
            ->whereHas('seatReservation.reservationCustomer.performance', function ($query) {
                $query->where('id', '=', '2');
            })
            ->get();
        $seats_base = Seat::with('deck')
            ->whereHas('deck', function ($query) {
                $query->where('deckNumber', '=', '0');
            })
              ->get();
        $seats = $seats_reserved;
        /*
        $seats->load(['seatReservation.reservationCustomer.performance' => function ($query) {
            $query->where('id', '=', '5');
        }]);
        //$seats->load('seatReservation.reservationCustomer.performance');

        /*
        $seats = Seat::with('deck', 'seatReservation.reservationCustomer.performance')
            ->whereHas('deck', function ($query) {
                $query->where('deckNumber', '=', '0');
            })
            ->whereHas('seatReservation.reservationCustomer.performance', function ($query) {
                $query->where('id', '=', '2');
            })
            ->get();
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
        $deck_0_id = DB::table('deck')->where('deckNumber', '=', '0')->first()->id;
        $deck_1_id = DB::table('deck')->where('deckNumber', '=', '1')->first()->id;
        $deck_2_id = DB::table('deck')->where('deckNumber', '=', '2')->first()->id;
        $deck_3_id = DB::table('deck')->where('deckNumber', '=', '3')->first()->id;
        $deck_4_id = DB::table('deck')->where('deckNumber', '=', '4')->first()->id;
        $seats_deck_0 = array(
            DB::table('seat')->where('deck_id', '=', $deck_0_id)->where('rowNumber', '=', 1)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_0_id)->where('rowNumber', '=', 2)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_0_id)->where('rowNumber', '=', 3)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_0_id)->where('rowNumber', '=', 4)->get());
        $seats_deck_1 = array(
            DB::table('seat')->where('deck_id', '=', $deck_1_id)->where('rowNumber', '=', 5)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_1_id)->where('rowNumber', '=', 6)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_1_id)->where('rowNumber', '=', 7)->get());
        $seats_deck_2 = array(
            DB::table('seat')->where('deck_id', '=', $deck_2_id)->where('rowNumber', '=', 8)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_2_id)->where('rowNumber', '=', 9)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_2_id)->where('rowNumber', '=', 10)->get());
        $seats_deck_3 = array(
            DB::table('seat')->where('deck_id', '=', $deck_3_id)->where('rowNumber', '=', 11)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_3_id)->where('rowNumber', '=', 12)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_3_id)->where('rowNumber', '=', 13)->get());
        $seats_deck_4 = array(
            DB::table('seat')->where('deck_id', '=', $deck_4_id)->where('rowNumber', '=', 14)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_4_id)->where('rowNumber', '=', 15)->get(),
            DB::table('seat')->where('deck_id', '=', $deck_4_id)->where('rowNumber', '=', 16)->get());
        return view('frontend.test')
            ->with('seats_deck_0', $seats_deck_0)
            ->with('seats_deck_1', $seats_deck_1)
            ->with('seats_deck_2', $seats_deck_2)
            ->with('seats_deck_3', $seats_deck_3)
            ->with('seats_deck_4', $seats_deck_4);
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
