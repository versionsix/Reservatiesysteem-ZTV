<?php

namespace App\Http\Controllers;

use App\Performance;
use App\Play;
use App\Seat;
use app\SeatReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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

    public function ShowVoorstellingpage($id, Request $request)
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

    public function VoorstellingRequest($id, Request $request)
    {

        $error_messages = [
            'buttons_selected.required' => 'U heeft niets geselecteerd, gelieve ten minste één stoel aan te duiden.',
        ];
        $validator = Validator::make($request->all(), [
            'buttons_selected' => 'required',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //$seats_selected_ids = explode(',', $request->input('buttons_selected'));
        //Else if no errors, redirect user
        return redirect()->action('FrontendController@ShowVoorstellingReserveerpage', $id)->with('buttons_selected', $request->input('buttons_selected'))->withInput();

    }

    public function ShowVoorstellingReserveerpage($id, Request $request)
    {
        //return '<pre>' . json_encode($request->all( ), JSON_PRETTY_PRINT) . '</pre>';

        $performance = Performance::with('play')->find($id);

        //$seats_selected_ids = session('buttons_selected');
        //Session data must exist, if user accesses by url directly, redirect him to right page.
        if (!($seats_selected_ids = session('buttons_selected')))
            return redirect()->action('FrontendController@ShowVoorstellingpage', $id);

        return view('frontend/reserveer', [
            'buttons_selected' => session('buttons_selected'),
            'id' => $id,
            'performance' => $performance]);

    }

    public function ReserveerRequest($id, Request $request)
    {
        //return '<pre>' . json_encode($request->all( ), JSON_PRETTY_PRINT) . '</pre>';
        $error_messages = [
            'eventName.required' => 'eventName error.',
        ];
        $validator = Validator::make($request->all(), [
            'eventName' => 'min:2',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('buttons_selected', $request->input('buttons_selected'))
                ->withInput();
        }
        //$seats_selected_ids = explode(',', $request->input('buttons_selected'));
        //Else if no errors, redirect user
        //return redirect()->action('FrontendController@ShowVoorstellingReserveerpage', $id)->with('seats_selected_ids', $seats_selected_ids);
        return 'foo';
    }

}
