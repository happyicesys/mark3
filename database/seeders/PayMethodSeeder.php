<?php

namespace Database\Seeders;

use App\Models\PayMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PayMethod::create([
            'code' => 0,
            'name' => 'Cash',
        ]);

        PayMethod::create([
            'code' => 1,
            'name' => 'Credit Card',
        ]);

        PayMethod::create([
            'code' => 2,
            'name' => 'Debit Card',
        ]);

        PayMethod::create([
            'code' => 3,
            'name' => 'Union Pay',
        ]);

        PayMethod::create([
            'code' => 4,
            'name' => 'Alipay',
        ]);

        PayMethod::create([
            'code' => 5,
            'name' => 'Sonic Pay',
        ]);

        PayMethod::create([
            'code' => 6,
            'name' => 'Wechat Pay',
        ]);

        PayMethod::create([
            'code' => 7,
            'name' => 'Passcode',
        ]);

        PayMethod::create([
            'code' => 10,
            'name' => 'Free Vend',
        ]);
    }
}
