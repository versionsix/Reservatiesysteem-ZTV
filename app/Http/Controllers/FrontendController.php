<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmReservationMail;
use App\Performance;
use App\Play;
use App\ReservationCustomer;
use App\Seat;
use App\SeatReservation;
use Barryvdh\Debugbar\Middleware\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class FrontendController extends Controller
{


    public function ShowHomepage()
    {
        $seats_state = '';

        $play = Play::where("enabled", "true")->first();
        //$play_name = $play->name;
        if ($play == false)
            return 'Er zijn geen voorstellingen gevonden. Onze excuses.';
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
                    'seats_free' => $total_seats_in_plan,
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
        //  return '<pre>' . json_encode($seats->get(), JSON_PRETTY_PRINT) . '</pre>';

        $performance = Performance::with('play')->find($id);
        for ($i = 1; $i <= 16; $i++) {
            $querry_row = clone $seats;
            $seatsArr[$i] = $querry_row
                ->where('rowNumber', '=', $i)
                ->orderBy('columnNumber', 'desc')
                ->get();
        }

        Debugbar::error('Error!');

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
            'buttons_selected.required' => 'Er is een onbekende fout opgetreden. Probeer opnieuw',
            'firstName.required' => 'Vul a.u.b. een voornaam in.',
            'surName.required' => 'Vul a.u.b. een achternaam in.',
            'address1.required' => 'Vul a.u.b. een adres in.',
            'email.between' => 'Vul a.u.b. een geldige email in.',
            'email.email' => 'Vul a.u.b. een geldige email in.',
            'email.required' => 'Vul a.u.b. een email in.',
            'zipCode.required' => 'Vul a.u.b. een postcode in.',
            'zipCode.min' => 'Een postcode moet minimaal 4 karakters lang zijn.',
            'telephoneNumber.required' => 'Vul a.u.b. een telefoonnummer in.',
            'telephoneNumber.min' => 'Een telefoonnummer moet minimaal 8 karakters lang zijn.',
            'place.required' => 'Vul a.u.b. een gemeente in.',

        ];
        $validator = Validator::make($request->all(), [
            'buttons_selected' => 'required',
            'firstName' => 'required',
            'surName' => 'required',
            'address1' => 'required|min:2',
            'place' => 'required',
            'zipCode' => 'required:min:4',
            'email' => 'Required|Between:3,254|Email',
            'telephoneNumber' => 'required|min:8',
        ], $error_messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('buttons_selected', $request->input('buttons_selected'))
                ->withInput();
        }
        //$seats_selected_ids = explode(',', $request->input('buttons_selected'));
        //Else if no errors, redirect user after saving the things to the database

        $reservation = $this->SaveReservation($id, $request);
        //return $reservation;
        return redirect()->action('FrontendController@ShowBevestigingspage', $reservation->token);
    }

    public function SaveReservation($id, Request $request)
    {
        $error_message = 'Tijden het reserveren van je zitplaats(en) is één of meerdere van de plaatsen helaas'
            . ' door iemand anders gereserveerd. De reservatie is afgebroken. '
            . 'Ga terug naar de hoofdpagina en kies een andere optie.';

        //Check of er in de tussentijd geen extra zitjes zijn bijgekomen
        $seats_selected_ids = explode(',', $request->input('buttons_selected'));
        foreach ($seats_selected_ids as $seat_selected_id) {
            $seatReservation = SeatReservation::where('performance_id', '=', $id)->where('seat_id', '=', $seat_selected_id)->first();
            if (!empty($seatReservation)) {
                App::abort(500, $error_message);
            }
            //return '<pre>' . json_encode($seatReservation, JSON_PRETTY_PRINT) . '</pre>';

        }

        //Registreer gebruiker in DB
        $reservationCustomer = new ReservationCustomer;
        $reservationCustomer->performance_id = $id;
        $reservationCustomer->firstName = $request->input('firstName');
        $reservationCustomer->surName = $request->input('surName');
        $reservationCustomer->address1 = $request->input('address1');
        $reservationCustomer->place = $request->input('place');
        $reservationCustomer->zipCode = $request->input('zipCode');
        $reservationCustomer->email = $request->input('email');
        $reservationCustomer->telephoneNumber = $request->input('telephoneNumber');
        $reservationCustomer->comment = $request->input('comment');
        $reservationCustomer->firstName = $request->input('firstName');
        $reservationCustomer->token = str_random(32);
        $reservationCustomer->save();

        //Loop door alle zitjes en steek ook deze in de db
        foreach ($seats_selected_ids as $seats_selected_id) {
            $seatReeservation = new seatReservation;
            $seatReeservation->seat_id = $seats_selected_id;
            $seatReeservation->reservation_customer_id = $reservationCustomer->id;
            $seatReeservation->performance_id = $id;
            $seatReeservation->state = 'reserved';
            $seatReeservation->save();
        }

        //Stuur Email om de registratie te bevestigen

        $email = new ConfirmReservationMail($reservationCustomer->firstName . ' ' . $reservationCustomer->surName, $reservationCustomer->email, $reservationCustomer);

        Mail::send($email);

        //Stuur naar de vorige functie de gegevens terug.
        return $reservationCustomer;
        //return '<pre>' . json_encode($reservationCustomer, JSON_PRETTY_PRINT) . '</pre>';

    }


    public function ShowBevestigingspage($token)
    {
        $reservationCustomer = ReservationCustomer::with('seatreservation', 'seatreservation.seat')->where('token', $token)->first();
        //return '<pre>' . json_encode($reservationCustomer, JSON_PRETTY_PRINT) . '</pre>';

        $id = $reservationCustomer->performance_id;
        $reservation_customer_id = $reservationCustomer->id;

        $seats = Seat::with(['seatReservation' => function ($query) use ($id, $reservation_customer_id) {
            $query->where('performance_id', '=', $id);
            $query->where('reservation_customer_id', '=', $reservation_customer_id);
        }]);

        for ($i = 1; $i <= 16; $i++) {
            $querry_row = clone $seats;
            $seatsArr[$i] = $querry_row
                ->where('rowNumber', '=', $i)
                ->orderBy('columnNumber', 'desc')
                ->get();
        }

        $performance = Performance::with('play')->find($id);

        return view('frontend/bevestiging', [
                'token' => $seatsArr, //Verbose rommel
                'seatsArr' => $seatsArr,
                'performance' => $performance]
        );
    }
}
