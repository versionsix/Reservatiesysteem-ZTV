<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(BaseDataSeeder::class);
        //$this->call(DemoDataSeeder::class);

    }
}
