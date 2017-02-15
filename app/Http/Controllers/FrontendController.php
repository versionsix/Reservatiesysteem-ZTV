<?php

namespace App\Http\Controllers;

use App\Performance;
use App\Seat;
use app\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function ShowHomepage()
    {
        $count = '';
        $performances = Performance::with('seatReservation')->where('enabled', 'true')->get();
        foreach ($performances as $performance){
            if (!($performance->seatReservation->isEmpty())){
                $seats_unavailable = SeatReservation::where('state', '<>', 'reserved')
                    ->where('performance_id', $performance->id)
                    ->count();
                $seats_reserved = SeatReservation::where('state', '<>', 'reserved')
                    ->where('performance_id', $performance->id)
                    ->count();
                $count[$performance->id] = [$seats_unavailable, $seats_reserved];
            }else{
                $count[$performance->id] = 0;
            }

        }


        return view('frontend/homepage',[
            'voorstellingen' => $performances,
            'count' => [$count]
        ]);
    }

    public function ShowContactpage()
    {
        return view('frontend/contact');
    }

    public function ShowVoorstellingpage($id)
    {

        $seats = Seat::with(['seatReservation' => function ($query) use ($id) {
            $query->where('performance_id', '=', $id);
        }]);

        for ($i = 1; $i <= 16; $i++) {
            $querry_row = clone $seats;
            $seatsArr[$i] = $querry_row
                ->where('rowNumber', '=', $i)
                ->orderBy('columnNumber', 'desc')
                ->get();
        }

        return view('frontend/voorstelling', [
            'seatsArr' => $seatsArr]);
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
