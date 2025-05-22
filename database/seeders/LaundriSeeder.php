<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\laundri;

class LaundriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Faker = Faker::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            laundri::create([
                'name' => $Faker->company,
                'address' => $Faker->address,
                'phone' => $Faker->phoneNumber,
                'email' => $Faker->email,
                'type' => $Faker->randomElement(['self_service', 'full_service'])
            ]);
        }
        laundri::create([
            'name' => $Faker->company,
            'address' => $Faker->address,
            'phone' => $Faker->phoneNumber,
            'email' => $Faker->email,
            'type' => $Faker->randomElement(['self_service', 'full_service'])
        ]);
    }
}
