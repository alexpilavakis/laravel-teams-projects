<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
                'name' => 'Team A',
            ]
        );
        Team::create([
                'name' => 'Team B',
            ]
        );
    }
}
