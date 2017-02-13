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
        DB::table('performance')->insert([
            'enabled' => 'true',
            'datum' => 'woensdag 25 jan	',
            'uur' => '14.00 uur',
        ]);
        DB::table('voorstellingen')->insert([
            'enabled' => 'true',
            'datum' => 'donderdag 26 jan	',
            'uur' => '14.00 uur',
        ]);
        DB::table('voorstellingen')->insert([
            'enabled' => 'true',
            'datum' => 'vrijdag 27 jan	',
            'uur' => '19.00 uur',
        ]);
    }
}
