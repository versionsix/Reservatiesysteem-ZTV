<?php

use Illuminate\Database\Seeder;

class PlayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPlay();
        $play_id = DB::table('play')->first()->id;
        Log::info('id: '.$play_id);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => 'woensdag 25 jan',
            'hour' => '14.00 uur',
            'enabled' => 'true',
            'seatingType' => 'fixed_seat_choice',
        ]);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => 'woensdag 25 jan',
            'hour' => '14.00 uur',
            'enabled' => 'true',
            'seatingType' => 'fixed_seat_choice',
        ]);
        DB::table('performance')->insert([
            'play_id' => $play_id,
            'date' => 'woensdag 25 jan',
            'hour' => '14.00 uur',
            'enabled' => 'true',
            'seatingType' => 'fixed_seat_choice',
        ]);
    }
    public function createPlay()
    {
        DB::table('play')->insert([
            'enabled' => 'true',
            'name' => 'Test Play',
        ]);
    }
}
