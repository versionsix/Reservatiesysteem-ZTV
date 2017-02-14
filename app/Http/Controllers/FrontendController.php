<?php

namespace App\Http\Controllers;

use App\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function ShowHomepage()
    {
        $voorstellingen = DB::table('performance')->where('enabled', 'true')->get();
        //return $voorstellingen;
        return view('frontend/homepage', ['voorstellingen' => $voorstellingen]);
    }

    public function ShowContactpage()
    {
        return view('frontend/contact');
    }
    public function ShowVoorstellingpage($id)
    {

        $seats = Seat::with('deck')
            ->with([ 'seatReservation.reservationcustomer' => function($query) use($id){
                $query->where('performance_id', '=', $id);
            }]);
/*
        $seats = Seat::with('deck', 'seatReservation.reservationCustomer');
*/
        //$seats = Seat::with('deck');
        $seats_reserved = Seat::with('deck', 'seatReservation.performance')
            ->whereHas('seatReservation.reservationCustomer.performance', function ($query) use($id) {
                $query->where('id', '=', $id);
            })
            ->get();
        //$performance = DB::table('performance')->where('id', $id)->first();
        return view('frontend/voorstelling', [
            'seats' => $seats,
            'seats_reserved' => $seats_reserved]);
    }
    public function ShowHandleidingpage()
    {
        return view('frontend/handleiding');
    }

    public function ShowBeheerLogin()
    {
        return view('backend/beheerlogin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
