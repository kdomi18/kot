<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // first create roles as we need to use them below
        $this->call(RoleSeeder::class);

        // create the main admin with email admin@admin.com and password password
        DB::table('users')->insert([
            'name' => 'Kejdi Domi',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        // assign the role of manager to the created admin
        DB::table('role_user')->insert([
            'id' => '1',
            'role_id' => '1',
            'user_id' => '1'
        ]);

        //seed 10 more users
        $this->call(UserSeeder::class);
        //randomly assign roles to users
        $this->call(RoleUserSeeder::class);

        // create crops and buyers
        $faker = Faker::create();

        foreach (range(1,20) as $index) {
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

        foreach (range(1,20) as $index){
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

        foreach (range(1,20) as $index){
            DB::table('suppliers')->insert([
                'name' => $faker->firstName($gender),
                'surname' => $faker->lastName,
                'organization' => $faker->company,
                'address' => $faker->address,
                'phone' => substr($faker->phoneNumber, 0,13),
                'other_contact' => $faker->randomElement(["null", "email@email.com"]),
                'supplies' => $faker->randomElement(["cherry trees", "tomato seeds","potato seeds", "calves", "horses"]),
                'profit_index' => random_int(1,5),
                'relative_distance' => $faker->time()
            ]);
        }
    }
}
