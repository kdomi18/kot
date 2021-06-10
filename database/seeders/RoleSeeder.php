<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Manager'
        ]);

        DB::table('roles')->insert([
            'name'=>'Owner'
        ]);

        DB::table('roles')->insert([
            'name'=>'Economist'
        ]);

        DB::table('roles')->insert([
            'name'=>'Employee'
        ]);

    }
}
