<?php

namespace App\Mail;

use App\Performance;
use App\ReservationCustomer;
use App\Seat;
use App\SeatReservation;
use App\SentMail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

setlocale(LC_TIME, 'Dutch');

class ConfirmReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $email_to;
    protected $name_to;
    protected $reservationCustomer;

    public function __construct($name_to, $email_to, $reservationCustomer)
    {
        $this->name_to = $name_to;
        $this->email_to = $email_to;
        $this->reservationCustomer = $reservationCustomer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        //Add the performance info

        $id = $this->reservationCustomer->performance_id;
        $reservation_customer_id = $this->reservationCustomer->id;

//        $seats = Seat::with(['seatReservation' => function ($query) use ($id, $reservation_customer_id) {
//            $query->whereHas('performance_id', '=', $id);
//            $query->whereHas('reservation_customer_id', '=', $reservation_customer_id);
//        }])->get();
        $seats = SeatReservation::with('seat')
            ->where('performance_id', '=', $id)
            ->where('reservation_customer_id', '=', $reservation_customer_id)
            ->get();

        $performance = Performance::with('play')->find($id);
        $performance->date = Carbon::createFromFormat('Y-m-d', $performance->date)->formatLocalized('%A %d %B %Y');
        $performance->hour = Carbon::createFromFormat('H:i:s', $performance->hour)->format('H.i \u\u\r');
        $content_vars = ['reservationCustomer' => $this->reservationCustomer, 'performance' => $performance, 'seats' => $seats];
        //Save mail also to DB
        $sentMail = new SentMail();
        $sentMail->name_to = $this->name_to;
        $sentMail->email_to = $this->email_to;
        $sentMail->email_content = json_encode($content_vars);
        $sentMail->save();
        \Debugbar::addMessage(json_encode($seats));
        \Debugbar::info($content_vars);
        return $this->from(getenv('MAIL_FROM'))
            ->to($this->email_to)
            ->subject('Bevestiging reservatie "' . $performance->play->name . '""')
            ->view('mail.ConfirmReservation')
            ->with($content_vars);
//            ->with();
//            ->with($seats);
    }
}
