<?php

namespace App\Http\Controllers;

use App\Performance;
use App\Play;
use App\Seat;
use app\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class FrontendController extends Controller
{


    public function ShowHomepage()
    {
        $seats_state = '';

        $play = Play::where("enabled", "true")->first();
        //$play_name = $play->name;
        $total_seats_in_plan = Seat::where('bookable', 'true')->count();
        $performances = Performance::with('seatReservation')->where('enabled', 'true')->where('play_id', $play->id)->get();
        foreach ($performances as $performance) {
            if (!($performance->seatReservation->isEmpty())) {
                $seats_total = $total_seats_in_plan - SeatReservation::where('state', '<>', 'reserved')
                        ->where('performance_id', $performance->id)
                        ->count();
                $seats_used = SeatReservation::where('state', '=', 'reserved')
                    ->where('performance_id', $performance->id)
                    ->count();

                $seats_state[$performance->id] = (object)[
                    'seats_total' => $seats_total,
                    'seats_used' => $seats_used,
                    'seats_free' => $seats_total - $seats_used,
                    'seats_percent_free' => 100 - round(100 * ($seats_used / $seats_total))];

            } else {
                $seats_state[$performance->id] = (object)[
                    'seats_total' => $total_seats_in_plan,
                    'seats_used' => 0,
                    'seats_percent_free' => 100];
            }

        }

        return view('frontend/homepage', [
            'performances' => $performances,
            'seats_state' => $seats_state,
            'play' => $play]);
    }

    public function ShowContactpage()
    {
        return view('frontend/contact');
    }


    public function ShowHandleidingpage()
    {
        return view('frontend/handleiding');
    }

    public function ShowBeheerLogin()
    {
        return view('backend/beheerlogin');
    }

    public function ShowVoorstellingpage($id)
    {

        $seats = Seat::with(['seatReservation' => function ($query) use ($id) {
            $query->where('performance_id', '=', $id);
        }]);
        $performance = Performance::with('play')->find($id);
        for ($i = 1; $i <= 16; $i++) {
            $querry_row = clone $seats;
            $seatsArr[$i] = $querry_row
                ->where('rowNumber', '=', $i)
                ->orderBy('columnNumber', 'desc')
                ->get();
        }

        return view('frontend/voorstelling', [
            'seatsArr' => $seatsArr,
            'performance' => $performance]);

    }

    public function ShowVoorstellingReserveerpage($id, Request $request){
        //return '<pre>' . json_encode($request->all(),JSON_PRETTY_PRINT) . '</pre>';
        $performance = Performance::with('play')->find($id);

        $seats_selected_ids = explode(',', $request->input('buttons_selected'));

        if ($request->isMethod('post') && $request->input('buttons_selected') != null) { //If seating is posted
            //return $request->input('eventCodes');
                return view('frontend/reserveer', [
                    'seats_selected_ids' => $seats_selected_ids,
                    'id' => $id,
                    'performance' => $performance]);
        }elseif($request->isMethod('post') && $request->input('client_info') != null){ //if customer information is posted
            return view('frontend/reserveer', [
                'seats_selected_ids' => $seats_selected_ids,
                'id' => $id,
                'performance' => $performance]);
        }else{
            return redirect()->action('FrontendController@ShowVoorstellingpage', $id);
        }
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
