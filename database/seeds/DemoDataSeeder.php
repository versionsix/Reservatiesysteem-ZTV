<?php

use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed some performances and add demo reservations to every performance:
        $play_id = DB::table('play')->first()->id;
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => '2017-02-19',
            'hour' => '01:01:00',
            'enabled' => 'true',
            'page_content' => 'Example 2',
            'seatingType' => 'fixed_seat_choice',
        ]);
        $performance_id = DB::table('performance')->orderBy('id', 'DESC')->first()->id;
        $this->AddReservationCustomer($performance_id,[1,2]);
        $this->AddReservationCustomer($performance_id,[3,4,5,6]);
        $this->AddReservationCustomer($performance_id,[15,14]);
        $this->AddReservationCustomer($performance_id,[13,12]);
        $this->AddReservationCustomer($performance_id,[11,12]);
        $this->AddReservationCustomer($performance_id,[213,214,215,216]);
        $this->AddReservationCustomer($performance_id,[115,114]);
        $this->AddReservationCustomer($performance_id,[113,112]);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => '2017-02-20',
            'hour' => '01:01:00',
            'enabled' => 'true',
            'page_content' => 'Example 3',
            'seatingType' => 'fixed_seat_choice',
        ]);
        $performance_id = DB::table('performance')->orderBy('id', 'DESC')->first()->id;
        $this->AddReservationCustomer($performance_id,[1,2]);
        $this->AddReservationCustomer($performance_id,[3,4,5,6]);
        $this->AddReservationCustomer($performance_id,[13,12]);
        $this->AddReservationCustomer($performance_id,[11,12]);
        $this->AddReservationCustomer($performance_id,[213,214,215,216,217,218,219]);
        $this->AddReservationCustomer($performance_id,[115,114]);
        $this->AddReservationCustomer($performance_id,[113,112,111,110,109]);
        $this->AddReservationCustomer($performance_id,[61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105]);
        $this->AddReservationCustomer($performance_id,[151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195]);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => '2017-02-21',
            'hour' => '01:01:00',
            'enabled' => 'true',
            'page_content' => 'Example 4 - Free Admission',
            'seatingType' => 'free_admission',
        ]);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => '2017-02-22',
            'hour' => '01:01:00',
            'enabled' => 'true',
            'page_content' => 'Example 5 - Free Seat choice',
            'seatingType' => 'free_seat_choice',
        ]);
        $performance_id = DB::table('performance')->orderBy('id', 'DESC')->first()->id;
        $this->AddReservationCustomer($performance_id,[1,2]);
        $this->AddReservationCustomer($performance_id,[3,4,5,6]);
        $this->AddReservationCustomer($performance_id,[15,14]);
        $this->AddReservationCustomer($performance_id,[25,24,26,27,28,29,30]);
        $this->AddReservationCustomer($performance_id,[13,12]);
        $this->AddReservationCustomer($performance_id,[11,12]);
        $this->AddReservationCustomer($performance_id,[213,214,215,216]);
        $this->AddReservationCustomer($performance_id,[115,114]);
        $this->AddReservationCustomer($performance_id,[113,112]);
    }
    public function AddSeatReservation($seat_id, $reservation_customer_id, $performance_id){
        DB::table('seatReservation')->insert([
            'seat_id' => $seat_id,
            'reservation_customer_id' => $reservation_customer_id,
            'performance_id' => $performance_id,
            'state' => 'reserved',
        ]);
    }
    public function AddReservationCustomer($performance_id, $seat_ids){
        $rand_firstname =  str_random(8);
        DB::table('reservationCustomer')->insert([
            'performance_id' => $performance_id,
            'firstName' =>  $rand_firstname,
            'surName' => 'Doe',
            'address1' => 'Kerkstraat',
            'place' => 'Turnhout',
            'zipCode' => '2300',
            'email' =>  $rand_firstname . '@example.com',
            'telephoneNumber' => '014/12.34.56',
            'comment' => str_random(12),
            'token' => str_random(32),
        ]);
        //Get above id
        $reservation_id = DB::table('reservationCustomer')->orderBy('id', 'DESC')->first()->id;
        foreach ($seat_ids as $seat_id){
            $this->AddSeatReservation($seat_id,$reservation_id,$performance_id);
        }

    }
}
