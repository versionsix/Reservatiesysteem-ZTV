<?php

namespace App\Mail;

use App\SentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $content_vars = ['data' => $this->reservationCustomer];
        //Save mail also to DB
        $sentMail = new SentMail();
        $sentMail->name_to = $this->name_to;
        $sentMail->email_to = $this->email_to;
        $sentMail->email_content = serialize($content_vars);
        $sentMail->save();

        return $this->from(getenv('MAIL_FROM'))
            ->to($this->email_to)
            ->view('mail.ConfirmReservation')
            ->with($content_vars);
    }
}
