<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        // factory(App\User::class, 2)->create();
        // factory(App\Apa::class, 2)->create();
    }
}
