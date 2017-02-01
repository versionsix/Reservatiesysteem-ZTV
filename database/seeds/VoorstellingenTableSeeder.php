<?php

use Illuminate\Database\Seeder;

class VoorstellingenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('voorstellingen')->insert([
            'enabled' => 'true',
            'datum' => 'woensdag 25 jan	',
            'uur' => '14.00 uur',
        ]);
    }
}
