<?php

use Illuminate\Database\Seeder;
use App\Statistic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Statistic::create(
            array(
              'total_visits' => '0',
            )
        );
    }
}
