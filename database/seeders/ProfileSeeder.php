<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'HAPPY ICE PTE LTD',
            'alias' => 'HI',
            'uen' => '201302530W',
            'base_currency_id' => 1
        ]);

        Profile::create([
            'name' => 'HAPPY ICE LOGISTIC PTE LTD',
            'alias' => 'HIL',
            'uen' => '201427642H',
            'base_currency_id' => 1
        ]);
    }
}
