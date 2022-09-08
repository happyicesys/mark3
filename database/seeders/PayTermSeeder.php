<?php

namespace Database\Seeders;

use App\Models\PayTerm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayTerm::create([
            'name' => 'C.O.D',
        ]);

        PayTerm::create([
            'name' => 'Prepaid',
        ]);

        PayTerm::create([
            'name' => 'In a Given # of Days',
        ]);

        PayTerm::create([
            'name' => 'On a Day of the Month',
        ]);

        PayTerm::create([
            'name' => '# of Days after EOM',
        ]);

        PayTerm::create([
            'name' => 'Day of Month after EOM',
        ]);

        PayTerm::create([
            'name' => '3 months',
        ]);

        PayTerm::create([
            'name' => '15 Days after EOM',
        ]);

        PayTerm::create([
            'name' => 'Pay on next delivery',
        ]);

        PayTerm::create([
            'name' => '15th & 30th of month',
        ]);

        PayTerm::create([
            'name' => '7 Days after EOM',
        ]);

        PayTerm::create([
            'name' => '30 Days',
        ]);

        PayTerm::create([
            'name' => '75 Days',
        ]);

        PayTerm::create([
            'name' => '60 Days',
        ]);
    }
}
