<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'name' => 'Singing practice I',
            'note' => 'for OC Asean Games, at studio I',
            'time' => Carbon::create('2020', '05', '01', '09', '00', '00'),
            'artist_id' => '1',
        ]);
    }
}
