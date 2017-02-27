<?php

use Illuminate\Database\Seeder;

class BaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Maak login user aan
        $this->call(UsersTableSeeder::class);
        $page_content = ' <div class="text-center"><h1>Zammelse Toneel Vrienden </h1>
                <p class="lead">Welkom op de pagina van de toneelreservaties. Hieronder is een overzicht van de data.
                    Selecteer je datum en vervolgens kan je je zitplaats selecteren. Je krijgt per mail een
                    bevestiging.</p>
                <p></p>
                </div>
            ';
        //Seed default Play
        DB::table('play')->insert([
            'enabled' => 'true',
            'name' => 'Example Play',
            'page_content' => $page_content,
        ]);

        //Seed default performance
        $play_id = DB::table('play')->first()->id;
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => '2017-02-18',
            'hour' => '01:01:00',
            'enabled' => 'true',
            'page_content' => 'Example',
            'seatingType' => 'fixed_seat_choice',
        ]);
        //Seed the seating plan
        $seat_rows = array //Rijen per array
        (
            array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15),
            array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30),
            array(31,32,33,34,35,36,37,38,39,40,41,42,43,44,45),
            array(46,47,48,49,50,51,52,53,54,55,56,57,58,59,60),
            array(61,62,63,64,65,66,67,68,69,70,71,72,73,74,75),
            array(76,77,78,79,80,81,82,83,84,85,86,87,88,89,90),
            array(91,92,93,94,95,96,97,98,99,100,101,102,103,104,105),
            array(106,107,108,109,110,111,112,113,114,115,116,117,118,119,120),
            array(121,122,123,124,125,126,127,128,129,130,131,132,133,134,135),
            array(136,137,138,139,140,141,142,143,144,145,146,147,148,149,150),
            array(151,152,153,154,155,156,157,158,159,160,161,162,163,164,165),
            array(166,167,168,169,170,171,172,173,174,175,176,177,178,179,180),
            array(181,182,183,184,185,186,187,188,189,190,191,192,193,194,195),
            array(196,197,NULL,NULL,NULL,198,199,200,201,202,203,204,205,206,207),
            array(NULL,NULL,NULL,NULL,208,209,210,211,212,213,214,215,216,217,218),
            array(NULL,NULL,NULL,NULL,NULL,NULL,NULL,219,220,221,222,223,224,225,226)
        );

        if(DB::table('seat')->get()->count() == 0){
            //Loop every row of seats and add them to the database
            foreach ($seat_rows as $row_num=>$seat_row) {
                echo 'Row: ' . $row_num . '=> OK! ';
                //get the deck id based on row number
                $deck = null;
                switch (true) {
                    case ($row_num +1 < 5):
                        $deck = 'Gelijkvloers';
                        break;
                    case ($row_num +1 < 8):
                        $deck = '1e_verhoog';
                        break;
                    case ($row_num +1 < 11):
                        $deck = '2e_verhoog';
                        break;
                    case ($row_num +1 < 14):
                        $deck = '3e_verhoog';
                        break;
                    case ($row_num +1 < 17):
                        $deck = '4e_verhoog';
                        break;
                }
                foreach ($seat_row as $column_num=>$seat_num) {
                    //set bookable only true if seat is available
                    $bookable = 'false';
                    if ($seat_num != NULL)
                        $bookable = 'true';

                    DB::table('seat')->insert([
                        'seatNumber' => $seat_num,
                        'rowNumber' => $row_num + 1,
                        'columnNumber' => $column_num + 1,
                        'bookable' => $bookable,
                        'deck' => $deck,
                    ]);
                }
            }
        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
