<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Brian',
            'email' => 'leehongjie91@gmail.com',
            'password' => 'brian1234',
        ]);

        $this->call([
            CountrySeeder::class,
            PayMethodSeeder::class,
            PayTermSeeder::class,
            TaxSeeder::class,
            // ProfileSeeder::class,
            UomSeeder::class,
            VendChannelErrorSeeder::class,
        ]);
    }
}
