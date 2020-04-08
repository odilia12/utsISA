<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            'name' => 'Asean Games Opening Ceremony',
            'notes' => 'at GBK',
            'end_date' => Carbon::create('2020', '10', '30'),
            'company_name' => 'Falcon Corp',
            'manager_id' => 1,
            'artist_id' => 1,
            'status' => 1

        ]);
    }
}
