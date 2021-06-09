<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,200) as $index) {
            DB::table('crops')->insert([
                'name' => $faker->randomElement(['tomatoes', 'potatoes', 'wheat', 'cucumber', 'eggplant', 'cherry']),
                'quantity' => $faker->randomNumber(2),
                'plant_time' => $faker->date(),
                'selling_price_pu' => $faker->randomNumber(2),
                'buying_price_pu' => $faker->randomNumber(2),
                'info'=> $faker->shuffleString("hello there")
            ]);
        }

        $gender = $faker->randomElement(["male", "female"]);

        foreach (range(1,200) as $index){
            DB::table('buyers')->insert([
                'name' => $faker->firstName($gender),
                'surname' => $faker->lastName,
                'organization' => $faker->company,
                'address' => $faker->address,
                'phone' => substr($faker->phoneNumber, 0,13),
                'other_contact' => $faker->randomElement(["null", "email@email.com"]),
                'buys' => $faker->randomElement(["cherries", "tomatoes","potatoes", "calves", "horses"]),
                'profit_index' => random_int(1,5),
                'relative_distance' => $faker->time()
            ]);
        }
    }
}
